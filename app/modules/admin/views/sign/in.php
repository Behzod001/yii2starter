<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 16.03.2019
 * Time: 22:16
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<!-- Begin page -->
<div class="container">
    <div class="full-content-center">
        <p class="text-center" style="font-size: 30px;color: #fff;">SmartTraining</p>
        <div class="login-wrap animated flipInX">
            <div class="login-block">
                <img src="/uploads/avatars/20.jpg" class="img-circle not-logged-avatar">
                <?php $form = ActiveForm::begin();?>
                <?= $form->field($model, 'email',[
                    'template'=>'<div class="form-group login-input"><i class="fa fa-envelope overlay"></i> {input} </div>'
                ])->textInput(['autofocus' => true, 'class' => 'form-control text-input','placeholder'=>' Email...'])->label(false) ?>

                <?= $form->field($model, 'password',[
                    'template'=>'<div class="form-group login-input"> <i class="fa fa-key overlay"></i> {input} </div>'
                ])->passwordInput(['placeholder'=>'********','class'=>'form-control text-input'])->label(false) ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?=Html::submitButton(Yii::t('app','Login'),['class'=>'btn btn-success btn-block'])?>
                        </div>
                        <div class="col-sm-6">
                            <?=Html::a(Yii::t('app','Sign up'),Url::to('/amdin/sign/up'),['class'=>'btn btn-default btn-block'])?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- the overlay modal element -->
<div class="md-overlay"></div>
<!-- End of eoverlay modal -->
<script>
    var resizefunc = [];
</script>




