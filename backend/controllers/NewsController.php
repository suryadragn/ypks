<?php

namespace backend\controllers;

use Yii;
use common\models\News;
use common\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /** @var \common\models\User $user */
            $user = Yii::$app->user->identity;
            if (Yii::$app->user->isGuest || !$user->canAccess(\common\models\User::PERM_NEWS)) {
                throw new \yii\web\ForbiddenHttpException('Anda tidak memiliki izin untuk mengelola modul Berita.');
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
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
        $model = new News();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = \yii\web\UploadedFile::getInstance($model, 'image');
                if ($image) {
                    $fileName = time() . '_' . $image->baseName . '.' . $image->extension;
                    $dir = Yii::getAlias('@public/uploads/news/');
                    
                    // Pastikan folder ada
                    if (!is_dir($dir)) {
                        mkdir($dir, 0777, true);
                    }

                    $path = $dir . $fileName;
                    if ($image->saveAs($path)) {
                        $model->image = $fileName;
                    }
                }
                
                if ($model->save()) {
                    if ($this->request->isAjax) {
                        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return ['success' => true, 'message' => 'Berita berhasil ditambahkan!'];
                    }
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        if ($this->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = \yii\web\UploadedFile::getInstance($model, 'image');
                if ($image) {
                    $fileName = time() . '_' . $image->baseName . '.' . $image->extension;
                    $path = \Yii::getAlias('@public/uploads/news/') . $fileName;
                    if ($image->saveAs($path)) {
                        $model->image = $fileName;
                        // Hapus file lama bila ada
                        if ($oldImage && file_exists(\Yii::getAlias('@public/uploads/news/') . $oldImage)) {
                            unlink(\Yii::getAlias('@public/uploads/news/') . $oldImage);
                        }
                    }
                } else {
                    $model->image = $oldImage;
                }

                if ($model->save()) {
                    if ($this->request->isAjax) {
                        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return ['success' => true, 'message' => 'Berita berhasil diperbarui!'];
                    }
                    return $this->redirect(['index']);
                }
            }
        }

        if ($this->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;
        
        if ($model->delete()) {
            if ($image && file_exists(\Yii::getAlias('@frontend/web/uploads/news/') . $image)) {
                unlink(\Yii::getAlias('@frontend/web/uploads/news/') . $image);
            }
        }

        if ($this->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => true, 'message' => 'Berita berhasil dihapus!'];
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
