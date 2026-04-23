<?php

namespace backend\controllers;

use common\models\Institution;
use common\models\InstitutionSearch;
use common\models\InstitutionProfile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use common\components\StorageHelper;
use Yii;

/**
 * InstitutionController implements the CRUD actions for Institution model.
 */
class InstitutionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /** @var \common\models\User $user */
            $user = Yii::$app->user->identity;
            if (Yii::$app->user->isGuest || !$user->canAccess(\common\models\User::PERM_INSTITUTION)) {
                throw new \yii\web\ForbiddenHttpException('Anda tidak memiliki izin untuk mengelola modul Lembaga.');
            }
            return true;
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Institution models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InstitutionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Institution model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Institution();
        $profile = new InstitutionProfile();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = UploadedFile::getInstance($model, 'logo');
                if ($image) {
                    $url = StorageHelper::upload($image, '@public/uploads/institution/');
                    if ($url) {
                        $model->logo = $url;
                    }
                }
                if ($model->save()) {
                    $profile->load($this->request->post());
                    $profile->institution_id = $model->id;
                    $profile->save();

                    if ($this->request->isAjax) {
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return ['success' => true, 'message' => 'Lembaga berhasil ditambahkan!'];
                    }
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->request->isAjax ? $this->renderAjax('create', ['model' => $model, 'profile' => $profile]) : $this->render('create', ['model' => $model, 'profile' => $profile]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $profile = $model->profile;
        if (!$profile) {
            $profile = new InstitutionProfile();
            $profile->institution_id = $model->id;
        }
        
        $oldLogo = $model->logo;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = UploadedFile::getInstance($model, 'logo');
            if ($image) {
                $url = StorageHelper::upload($image, '@public/uploads/institution/');
                if ($url) {
                    $model->logo = $url;
                    // Delete old local logo if it exists
                    if ($oldLogo && !StorageHelper::isUrl($oldLogo)) {
                        $path = Yii::getAlias('@public/uploads/institution/') . $oldLogo;
                        if (file_exists($path)) unlink($path);
                    }
                }
            } else {
                $model->logo = $oldLogo;
            }
            if ($model->save()) {
                $profile->load($this->request->post());
                $profile->save();
                
                if ($this->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ['success' => true, 'message' => 'Data lembaga berhasil diperbarui!'];
                }
                return $this->redirect(['index']);
            }
        }

        return $this->request->isAjax ? $this->renderAjax('update', ['model' => $model, 'profile' => $profile]) : $this->render('update', ['model' => $model, 'profile' => $profile]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $logo = $model->logo;
        if ($model->delete() && $logo && !StorageHelper::isUrl($logo)) {
            $path = Yii::getAlias('@public/uploads/institution/') . $logo;
            if (file_exists($path)) unlink($path);
        }

        if ($this->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['success' => true, 'message' => 'Lembaga berhasil dihapus!'];
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Institution model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Institution the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Institution::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
