<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('app', 'Language management') ?>
    </div>
    <div class="panel-body">
        <div class="content-box">
            <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'local')->textInput() ?>
            <?= $form->field($model, 'defaultl')->checkbox() ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary btn-block']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
