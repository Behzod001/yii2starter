<?php

use yii\helpers\Url;

$action = $this->context->action->id;
?>
<form>
    <ul class="nav nav-pills content-box">
        <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
            <a href="<?= Url::to('/admin/translation/index') ?>">
                <?php if ($action != 'index') : ?>
                    <i class="glyph-icon icon-chevron-left font-12"></i>
                <?php endif; ?>
                <?= Yii::t('app', 'Translations') ?>
            </a>
        </li>
        <li <?= ($action === 'create') ? 'class="active"' : '' ?>>
            <a href="<?= Url::to('/admin/translation/create') ?>"><?= Yii::t('app', 'Add word') ?></a>
        </li>
        <li <?= ($action === 'language') ? 'class="active"' : '' ?>>
            <a href="<?= Url::to('/admin/translation/language') ?>"><?= Yii::t('app', 'Languages') ?></a>
        </li>
        <li class="pull-right">
            <button type="submit" class="form-control"><i class="fa fa-search"></i></button>
        </li>
        <li class="pull-right">
            <input type="text" name="q" class="form-control" placeholder="<?= Yii::t('app', 'Search') ?>"/>
        </li>

    </ul>
</form>
