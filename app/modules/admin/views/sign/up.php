<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 16.03.2019
 * Time: 22:17
 */

use yii\widgets\ActiveForm;

?>



<!-- Begin page -->
<div class="container">
    <div class="full-content-center animated fadeInDownBig">
        <p class="text-center"><a href="#"><img src="/src/assets/img/login-logo.png" alt="Logo"></a></p>
        <div class="login-wrap">
            <div class="login-block">
                <?php $form = ActiveForm::begin();?>
                <?= $form->field($model, 'email',[
                        'template'=>'<div class="form-group login-input"><i class="fa fa-envelope overlay"></i> {input} </div>'
                ])->textInput(['autofocus' => true, 'class' => 'form-control text-input','placeholder'=>' Email...'])->label(false) ?>

                <?= $form->field($model, 'firstname',[
                    'template'=>'<div class="form-group login-input"> <i class="fa fa-user overlay"></i> {input} </div>'
                ])->textInput(['placeholder'=>' Firstname...','class'=>'form-control text-input'])->label(false) ?>

                <?= $form->field($model, 'password',[
                    'template'=>'<div class="form-group login-input"> <i class="fa fa-key overlay"></i> {input} </div>'
                ])->passwordInput(['placeholder'=>' Password...','class'=>'form-control text-input'])->label(false) ?>
                    <div class="checkbox"><label><input type="checkbox" class="form-control"> I accept <strong><a href='#'>Terms and Conditions</a></strong></label></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?=\yii\helpers\Html::submitButton('Register',['class'=>'btn btn-default btn-block'])?>
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




