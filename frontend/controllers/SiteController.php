<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Use blank layout for authentication pages.
     */
    public function beforeAction($action)
    {
        $authActions = ['login', 'signup', 'request-password-reset', 'reset-password', 'resend-verification-email'];
        if (in_array($action->id, $authActions)) {
            $this->layout = 'blank';
        }
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            // Simpan ke database (Inbox)
            $message = new \common\models\ContactMessage();
            $message->name = $model->name;
            $message->email = $model->email;
            $message->subject = $model->subject;
            $message->body = $model->body;
            $message->save();

            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Terima kasih telah menghubungi kami. Kami akan merespon pesan Anda secepatnya.');
            } else {
                Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat mengirim pesan.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $activeInstitutionCount = \common\models\Institution::find()->where(['is_active' => 1])->count();
        return $this->render('about', [
            'activeInstitutionCount' => $activeInstitutionCount,
        ]);
    }

    public function actionLembaga()
    {
        $institutions = \common\models\Institution::find()->where(['is_active' => 1])->all();
        return $this->render('lembaga', [
            'institutions' => $institutions
        ]);
    }

    public function actionViewLembaga($id)
    {
        $model = \common\models\Institution::find()->where(['id' => $id, 'is_active' => 1])->one();
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Lembaga tidak ditemukan atau sudah tidak aktif.');
        }

        return $this->render('view-lembaga', [
            'model' => $model,
            'profile' => $model->profile
        ]);
    }

    public function actionBerita()
    {
        $newsList = \common\models\News::find()
            ->where(['status' => 10])
            ->orderBy(['publish_date' => SORT_DESC, 'created_at' => SORT_DESC])
            ->all();

        return $this->render('berita', [
            'newsList' => $newsList,
        ]);
    }

    public function actionViewBerita($id)
    {
        $model = \common\models\News::findOne($id);
        if ($model === null) {
            throw new \yii\web\NotFoundHttpException('Halaman berita yang Anda cari tidak ditemukan.');
        }

        return $this->render('view-berita', [
            'model' => $model,
        ]);
    }

    public function actionGaleri()
    {
        $galleries = \common\models\Gallery::find()
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('galeri', [
            'galleries' => $galleries,
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Pendaftaran berhasil! Akun Anda sedang menunggu verifikasi admin. Silakan login nanti.');
            return $this->redirect(['/admin/site/login']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->verifyEmail()) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionProgram($id_type = null)
    {
        $query = \common\models\SocialProgram::find()->where(['status' => 1]);
        
        if ($id_type) {
            $query->andWhere(['type_id' => $id_type]);
            $selectedType = \common\models\SocialProgramType::findOne($id_type);
        } else {
            $selectedType = null;
        }

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query->orderBy(['is_featured' => SORT_DESC, 'created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);

        $types = \common\models\SocialProgramType::find()->all();

        return $this->render('program', [
            'dataProvider' => $dataProvider,
            'types' => $types,
            'selectedType' => $selectedType,
        ]);
    }

    public function actionViewProgram($slug)
    {
        $model = \common\models\SocialProgram::find()->where(['slug' => $slug])->one();
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Halaman tidak ditemukan.');
        }

        return Yii::$app->request->isAjax 
            ? $this->renderAjax('view-program', ['model' => $model]) 
            : $this->render('view-program', ['model' => $model]);
    }
}
