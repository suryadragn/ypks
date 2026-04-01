<?php

namespace backend\controllers;

use common\models\Gallery;
use common\models\GallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use Yii;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /** @var \common\models\User $user */
            $user = Yii::$app->user->identity;
            if (Yii::$app->user->isGuest || !$user->canAccess(\common\models\User::PERM_GALLERY)) {
                throw new \yii\web\ForbiddenHttpException('Anda tidak memiliki izin untuk mengelola modul Galeri.');
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
     * Lists all Gallery models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
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
        $model = new Gallery();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = UploadedFile::getInstance($model, 'image');
                if ($image) {
                    $fileName = 'gallery_' . time() . '.' . $image->extension;
                    $path = Yii::getAlias('@frontend/web/uploads/gallery/') . $fileName;
                    if ($image->saveAs($path)) $model->image = $fileName;
                }
                if ($model->save()) {
                    if ($this->request->isAjax) {
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return ['success' => true, 'message' => 'Foto galeri berhasil ditambahkan!'];
                    }
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->request->isAjax ? $this->renderAjax('create', ['model' => $model]) : $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if ($image) {
                $fileName = 'gallery_' . time() . '.' . $image->extension;
                $path = Yii::getAlias('@frontend/web/uploads/gallery/') . $fileName;
                if ($image->saveAs($path)) {
                    $model->image = $fileName;
                    if ($oldImage && file_exists(Yii::getAlias('@frontend/web/uploads/gallery/') . $oldImage)) {
                        unlink(Yii::getAlias('@frontend/web/uploads/gallery/') . $oldImage);
                    }
                }
            } else {
                $model->image = $oldImage;
            }
            if ($model->save()) {
                if ($this->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ['success' => true, 'message' => 'Foto galeri berhasil diperbarui!'];
                }
                return $this->redirect(['index']);
            }
        }

        return $this->request->isAjax ? $this->renderAjax('update', ['model' => $model]) : $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $file = $model->image;
        if ($model->delete() && $file) {
            $path = Yii::getAlias('@frontend/web/uploads/gallery/') . $file;
            if (file_exists($path)) unlink($path);
        }

        if ($this->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['success' => true, 'message' => 'Foto galeri berhasil dihapus!'];
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
