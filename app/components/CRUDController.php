<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 06.06.2019
 * Time: 11:16
 */

namespace app\components;

use Yii;
use yii\base\Exception;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;


class CRUDController extends \yii\web\Controller
{
    public $model;
    public $image;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $m = '\\app\\models\\'.$this->model."Search";
        $searchModel = new $m;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Walking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $m = '\\app\\models\\'.$this->model;
        $model = new $m;

        if ($model->load(Yii::$app->request->post()) && $this->fileUpload($model, $this->image, strtolower($this->model)) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }else if($model->hasErrors()){
           throw new \Exception($model->getErrors());

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Transmission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $this->fileUpload($model, $this->image, strtolower($this->model)) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Displays a single Transmission model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Deletes an existing Walking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if( file_exists(Yii::getAlias('@webroot').$model->{$this->image})){@unlink(Yii::getAlias('@webroot').$model->{$this->image});}
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $model
     * @param $row
     * @param $uploadFileName
     * @return bool|void
     * @throws \yii\base\Exception
     */
    protected function fileUpload($model, $row, $uploadFileName)
    {

        $dir = new \yii\helpers\BaseFileHelper();
        $files = \yii\web\UploadedFile::getInstance($model, $row);
        $name = Yii::$app->security->generateRandomString(12);
        $uploadPath = 'uploads/' . $uploadFileName;
        $dir->createDirectory($uploadPath);
        $isUpload = $files->saveAs($uploadPath . '/' . $name . '.' . $files->extension);
        $model->{$row}= '/' . $uploadPath . '/' . $name . '.' . $files->extension;
        if( file_exists(Yii::getAlias('@webroot').$model->oldAttributes[$row])){@unlink(Yii::getAlias('@webroot').$model->oldAttributes[$row]);}

        if ($isUpload) {
            return true;
        } else {
            return var_dump($model->getErrors());exit;
        }
    }

    /**
     * Finds the Engine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Engine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $m = '\\app\\models\\'.$this->model;
        if (($model = $m::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


}