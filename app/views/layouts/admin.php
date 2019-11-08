<?php

/* @var $this \yii\web\View */
/* @var $content string */

/**
 * @see AppAsset
 * @see \yii\web\View::registerCsrfMetaTags()
 * @see \app\components\Controller::renderWithAccess
 */
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="description" content="">
    <meta name="keywords" content="Tinglovchilarni o'qitish natijalarini baholash">
    <meta name="author" content="Xayrullayev Behzod">

    <link rel="shortcut icon" href="/src/assets/img/favicon.ico">
    <link rel="apple-touch-icon" href="/src/assets/img/apple-touch-icon.png"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/src/assets/img/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/src/assets/img/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/src/assets/img/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/src/assets/img/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="/src/assets/img/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="/src/assets/img/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="/src/assets/img/apple-touch-icon-152x152.png"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="fixed-left">

<?php $this->beginBody();
$user = Yii::$app->user->identity;
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
?>

<?= Yii::$app->controller->renderPartial('//blocks/a_top', ['user' => $user]) ?>

<?= Yii::$app->controller->renderPartial('//blocks/left', ['user' => $user, 'action' => $action, 'controller' => $controller]) ?>

<?= Yii::$app->controller->renderPartial('//blocks/a_right', ['user' => $user]) ?>
<!-- Start right content -->
<div class="content-page">
    <div class="content">
        <?= $content ?>
    </div>
</div>
<?= Yii::$app->controller->renderPartial('//blocks/a_footer') ?>

<!-- End of page -->
<!-- the overlay modal element -->
<div class="md-overlay"></div>
<!-- End of eoverlay modal -->
<script>
    var resizefunc = [];

</script>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
