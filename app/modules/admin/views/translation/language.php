<?php

use app\components\Url;

$this->title = Yii::t('app', 'Languages');
?>
<?= $this->render('_menu') ?>
<div class="content-box">
    <?php if ($data->count > 0) : ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th width="50">#</th>
                <th><?= Yii::t('app', 'Name') ?></th>
                <th><?= Yii::t('app', 'Title') ?></th>
                <th><?= Yii::t('app', 'Translations') ?></th>
                <th width="200"><?= Yii::t('app', 'Change') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $number = 1;
            foreach ($data->models as $module) : ?>
                <tr>
                    <td><?= $number++; ?></td>
                    <td><a href="<?= Url::to('/admin/translation/edit/' . $module->primaryKey) ?>"
                           title="<?= Yii::t('app', 'Edit') ?>"><?= $module->name ?></a></td>
                    <td><?= $module->url ?></td>
                    <td><?= $module->name ?></td>
                    <td class="control">
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="<?= Url::to('/admin/translation/languageedit/' . $module->primaryKey) ?>"
                               class="btn btn-success" title="<?= Yii::t('app', 'Move up') ?>"><span
                                        class="fa fa-edit"></span></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <?= yii\widgets\LinkPager::widget([
                'pagination' => $data->pagination
            ]) ?>
        </table>
    <?php else : ?>
        <p><?= Yii::t('app', 'No records found') ?></p>
    <?php endif; ?>
</div>