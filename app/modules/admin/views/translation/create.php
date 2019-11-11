<?php
$this->title = Yii::t('app', 'Create template');
?>
<?= $this->render('_menu') ?>
<?= $this->render('_form', ['model' => $model]) ?>