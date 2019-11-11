<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="content-box">
    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>
    <?= $form->field($model, 'category')->textInput(['value' => 'app']); ?>

    <?= $form->field($model, 'message')->textInput() ?>
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary btn-block']) ?>
    <?php ActiveForm::end(); ?>
</div>