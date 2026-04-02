<?php

namespace backend\controllers;

use Yii;
use common\models\DonationAccount;
use common\models\DonationAccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DonationAccountController implements the CRUD actions for DonationAccount model.
 */
class DonationAccountController extends Controller
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

    /**
     * Lists all DonationAccount models.
     */
    public function actionIndex()
    {
        $searchModel = new DonationAccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new DonationAccount model.
     */
    public function actionCreate()
    {
        $model = new DonationAccount();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if ($this->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => true, 'message' => 'Rekening donasi berhasil ditambahkan!'];
            }
            Yii::$app->session->setFlash('success', 'Rekening donasi berhasil ditambahkan.');
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

    /**
     * Updates an existing DonationAccount model.
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if ($this->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => true, 'message' => 'Rekening donasi berhasil diperbarui!'];
            }
            Yii::$app->session->setFlash('success', 'Rekening donasi berhasil diperbarui.');
            return $this->redirect(['index']);
        }

        return $this->request->isAjax ? $this->renderAjax('update', [
            'model' => $model,
        ]) : $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DonationAccount model.
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        if ($this->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => true, 'message' => 'Rekening donasi berhasil dihapus!'];
        }
        Yii::$app->session->setFlash('success', 'Rekening donasi berhasil dihapus.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the DonationAccount model based on its primary key value.
     */
    protected function findModel($id)
    {
        if (($model = DonationAccount::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang diminta tidak ditemukan.');
    }
}
