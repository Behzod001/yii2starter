<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 02.06.2019
 * Time: 21:04
 */

namespace app\modules\admin\controllers;

use app\components\Url;
use app\models\Lang;
use app\models\Message;
use app\models\SourceMessage;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\Response;


class TranslationController extends Controller
{
    public function actionIndex()
    {
        $query = SourceMessage::find()->joinWith('messages')->orderBy(['id' => SORT_DESC]);
        if (isset($_GET['q'])) {
            $query->orFilterWhere(['like', "`message`.`translation`", $_GET['q']]);
            $query->orFilterWhere(['like', 'message', $_GET['q']]);
        }
        $data = new ActiveDataProvider([
            'query' => $query,
        ]);
        \Yii::$app->user->setReturnUrl(Url::to('/admin/translation/index'));

        return $this->render('index', [
            'data' => $data
        ]);
    }

    public function actionCreate()
    {
        $model = new SourceMessage();

        if ($model->load(\Yii::$app->request->post())) {
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            } else {
                if ($model->save()) {
                    Yii::$app->session->setflash('success', \Yii::t('app', 'Message source is created'));
                    return $this->redirect(Url::to('/admin/translation/index'));
                } else {
                    Yii::$app->session->setflash('error', \Yii::t('app', 'Create error. {0}', $model->formatErrors()));
                    return $this->refresh();
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionEdit($id)
    {
        $model = SourceMessage::findOne($id);
        if ($model === null) {
            Yii::$app->session->setflash('error', \Yii::t('app', 'Not found'));
            return $this->redirect(Url::to('/admin/translation/index'));
        }
        if ($model->load(\Yii::$app->request->post())) {
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            } else {
                if ($model->save()) {
                    Yii::$app->session->setflash('success', \Yii::t('app', 'Message is updated'));
                } else {
                    Yii::$app->session->setflash('error', \Yii::t('app', 'Update error. {0}', $model->formatErrors()));
                }
                return $this->refresh();
            }
        } else {
            return $this->render('edit', [
                'model' => $model
            ]);
        }

    }

    public function actionSave()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (\Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post()['data'];
            $temp = Message::find()->where(['language' => $post['language'], 'id' => $post['id']])->one();
            if ($temp) $model = $temp;
            else $model = new Message();
            $model->translation = $post['translation'];
            $model->language = $post['language'];
            if (!$temp) $model->id = $post['id'];
            if ($model->save()) {
                return ['status' => 'ok'];
            } else {
                return ['error' => $model->getErrors()];
            }
        }
    }

    public function actionLanguage()
    {
        $data = new ActiveDataProvider([
            'query' => Lang::find(),
        ]);
        \Yii::$app->user->setReturnUrl(Url::to('/admin/translation/languages'));

        return $this->render('language', [
            'data' => $data
        ]);
    }

    public function actionLanguageedit($id)
    {
        $model = Lang::findOne(['id' => $id]);
        if ($model === null) {
            Yii::$app->session->setflash('error', \Yii::t('app', 'Not found'));
            return $this->redirect(Url::to('/admin/translation/index'));
        }
        if ($model->load(\Yii::$app->request->post())) {
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            } else {
                if ($model->save()) {
                    Yii::$app->session->setflash('success', \Yii::t('app', 'Language is updated'));
                } else {
                    Yii::$app->session->setflash('error', \Yii::t('app', 'Update error. {0}', $model->formatErrors()));
                }
                return $this->refresh();
            }
        } else {
            return $this->render('langedit', [
                'model' => $model
            ]);
        }
    }

    public function actionDelete($id)
    {
        if (($model = SourceMessage::findOne($id))) {
            $model->delete();
        } else {
            //$this->error = \Yii::t('app', 'Not found');
        }
        return $this->redirect(['index']);
    }
}