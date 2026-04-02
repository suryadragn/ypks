<?php

namespace backend\controllers;

use Yii;
use common\models\SocialProgram;
use common\models\SocialProgramSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\Inflector;

/**
 * SocialProgramController implements the CRUD actions for SocialProgram model.
 */
class SocialProgramController extends Controller
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
        $searchModel = new SocialProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new SocialProgram();

        if ($this->request->isPost && $model->load($this->request->post())) {
            $imageFile = UploadedFile::getInstance($model, 'image');
            if ($imageFile) {
                $imageName = 'program_' . time() . '.' . $imageFile->extension;
                $imagePath = Yii::getAlias('@frontend/web/uploads/programs/') . $imageName;
                
                // Ensure directory exists
                if (!is_dir(dirname($imagePath))) {
                    mkdir(dirname($imagePath), 0777, true);
                }
                
                if ($imageFile->saveAs($imagePath)) {
                    $model->image = $imageName;
                }
            }

            if ($model->save()) {
                if ($this->request->isAjax) {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return ['success' => true, 'message' => 'Program berhasil ditambahkan!'];
                }
                Yii::$app->session->setFlash('success', 'Program berhasil ditambahkan.');
                return $this->redirect(['index']);
            }
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
        $oldImage = $model->image;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $imageFile = UploadedFile::getInstance($model, 'image');
            if ($imageFile) {
                $imageName = 'program_' . time() . '.' . $imageFile->extension;
                $imagePath = Yii::getAlias('@frontend/web/uploads/programs/') . $imageName;
                
                if (!is_dir(dirname($imagePath))) {
                    mkdir(dirname($imagePath), 0777, true);
                }

                if ($imageFile->saveAs($imagePath)) {
                    $model->image = $imageName;
                    // Delete old image
                    if ($oldImage && file_exists(Yii::getAlias('@frontend/web/uploads/programs/') . $oldImage)) {
                        unlink(Yii::getAlias('@frontend/web/uploads/programs/') . $oldImage);
                    }
                }
            } else {
                $model->image = $oldImage;
            }

            if ($model->save()) {
                if ($this->request->isAjax) {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return ['success' => true, 'message' => 'Program berhasil diperbarui!'];
                }
                Yii::$app->session->setFlash('success', 'Program berhasil diperbarui.');
                return $this->redirect(['index']);
            }
        }

        return $this->request->isAjax ? $this->renderAjax('update', [
            'model' => $model,
        ]) : $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;
        if ($model->delete()) {
            if ($image && file_exists(Yii::getAlias('@frontend/web/uploads/programs/') . $image)) {
                unlink(Yii::getAlias('@frontend/web/uploads/programs/') . $image);
            }
            if ($this->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => true, 'message' => 'Program berhasil dihapus!'];
            }
            Yii::$app->session->setFlash('success', 'Program berhasil dihapus.');
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = SocialProgram::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman yang diminta tidak tersedia.');
    }
}
