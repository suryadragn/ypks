<?php

namespace backend\controllers;

use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete'     => ['POST'],
                    'verify'     => ['POST'],
                    'deactivate' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            // Hanya Superadmin yang boleh mengelola user
            if (Yii::$app->user->isGuest || !Yii::$app->user->identity->is_superadmin) {
                throw new ForbiddenHttpException('Hanya Superadmin yang boleh mengakses halaman ini.');
            }
            return true;
        }
        return false;
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing User model.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Hak akses user "' . $model->username . '" berhasil diperbarui.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Manually verify/activate a user account.
     */
    public function actionVerify($id)
    {
        $model = $this->findModel($id);
        if ($model->status !== User::STATUS_ACTIVE) {
            $model->status = User::STATUS_ACTIVE;
            $model->verification_token = null; // Clear token
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Akun \"$model->username\" berhasil diverifikasi dan diaktifkan!");
            } else {
                Yii::$app->session->setFlash('error', 'Gagal memverifikasi akun.');
            }
        } else {
            Yii::$app->session->setFlash('info', 'Akun ini sudah aktif.');
        }
        return $this->redirect(['index']);
    }

    /**
     * Deactivate/suspend an active user account.
     */
    public function actionDeactivate($id)
    {
        if ($id == Yii::$app->user->id) {
            Yii::$app->session->setFlash('error', 'Anda tidak bisa menonaktifkan akun sendiri.');
            return $this->redirect(['index']);
        }
        $model = $this->findModel($id);
        if ($model->status === User::STATUS_ACTIVE) {
            $model->status = User::STATUS_INACTIVE;
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', "Akun \"$model->username\" berhasil dinonaktifkan.");
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing User model.
     */
    public function actionDelete($id)
    {
        if ($id == Yii::$app->user->id) {
            Yii::$app->session->setFlash('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        } else {
            $this->findModel($id)->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
