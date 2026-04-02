<?php

namespace backend\controllers;

use Yii;
use common\models\SocialProgramType;
use common\models\SocialProgramTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SocialProgramTypeController implements the CRUD actions for SocialProgramType model.
 */
class SocialProgramTypeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            /** @var \common\models\User $user */
                            $user = Yii::$app->user->identity;
                            return $user->canAccess(\common\models\User::PERM_PROGRAM);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SocialProgramTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new SocialProgramType();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if ($this->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => true, 'message' => 'Referensi program berhasil ditambahkan.'];
            }
            Yii::$app->session->setFlash('success', 'Referensi program berhasil ditambahkan.');
            return $this->redirect(['index']);
        } else {
            $model->loadDefaultValues();
        }

        return $this->request->isAjax ? $this->renderAjax('create', [
            'model' => $model,
        ]) : $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if ($this->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => true, 'message' => 'Referensi program berhasil diperbarui.'];
            }
            Yii::$app->session->setFlash('success', 'Referensi program berhasil diperbarui.');
            return $this->redirect(['index']);
        }

        return $this->request->isAjax ? $this->renderAjax('update', [
            'model' => $model,
        ]) : $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        if ($this->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => true, 'message' => 'Referensi program berhasil dihapus.'];
        }
        Yii::$app->session->setFlash('success', 'Referensi program berhasil dihapus.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = SocialProgramType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang diminta tidak tersedia.');
    }
}
