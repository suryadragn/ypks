<?php

namespace backend\controllers;

use common\models\Page;
use common\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use Yii;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{
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
     * Lists all Page models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
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
        $model = new Page();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                if ($this->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ['success' => true, 'message' => 'Halaman berhasil dibuat!'];
                }
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->request->isAjax ? $this->renderAjax('create', ['model' => $model]) : $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if ($this->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['success' => true, 'message' => 'Halaman berhasil diperbarui!'];
            }
            return $this->redirect(['index']);
        }

        return $this->request->isAjax ? $this->renderAjax('update', ['model' => $model]) : $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        if ($this->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['success' => true, 'message' => 'Halaman berhasil dihapus!'];
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
