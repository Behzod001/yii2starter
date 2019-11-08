<?php

use app\models\Lang;
use yii\helpers\Url;

$languages = Lang::find()->all();
$this->title = Yii::t('app', 'Translations');
$this->registerJs("

$('.addTranslation').click(function(){
var pk=$(this).attr('data-pk');

var translation=$('#translation').val('');
$('#translationAdd').modal('show');
$('#pk').val(pk);
});
$('#saveTranslation').click(function(){
    var translation=$('#translation').val();
    var id=$('#pk').val();
    var language=$('#lang').val();
    var data = {id:id,language:language,translation:translation};
    $.post('" . Url::to('/admin/translation/save') . "',{data:data},function(response){
        window.location.reload();
//    console.log(response);
    });
    
});
$('.updateTranslation').click(function(){
    $('#lang').val($(this).attr('data-lang'));
    $('#translation').val($(this).attr('data-translation'));
    $('#pk').val($(this).attr('data-pk'));
    $('#translationAdd').modal('show');
});
");
?>
<p>
    <?= $this->render('_menu') ?>
</p>

<!-- /.well -->
<div class="content-box">

    <?php if ($data->count > 0) : ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th width="50">#</th>
                <th><?= Yii::t('app', 'Name') ?></th>
                <th><?= Yii::t('app', 'Category') ?></th>
                <th><?= Yii::t('app', 'Default') ?></th>
                <th><?= Yii::t('app', 'Translations') ?></th>
                <th width="200"><?= Yii::t('app', 'Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $number = 1;
            foreach ($data->models as $module) : ?>
                <tr>
                    <td><?= $number++ ?></td>
                    <td><a href="<?= Url::to('/admin/translation/edit/' . $module->primaryKey) ?>"
                           title="<?= Yii::t('app', 'Edit') ?>"><?= Yii::t("app", $module->message) ?></a></td>
                    <td><?= $module->getCatList()[$module->category] ?></td>
                    <td><?= $module->message ?></td>
                    <td class="col-md-2"><? if ($module->messages) foreach ($module->messages as $message) { ?>
                            <button class="btn btn-success btn-sm updateTranslation" data-pk="<?= $message->id ?>"
                                    data-lang="<?= $message->language ?>"
                                    data-translation="<?= $message->translation ?>">
                                <?= $message->language ?>
                            </button>
                        <? } ?></td>
                    <td class="control">
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="<?= Url::to('/admin/translation/edit/' . $module->primaryKey) ?>"
                               class="btn btn-success" title="<?= Yii::t('app', 'Move up') ?>"><span
                                        class="fa fa-edit"></span></a>
                            <a data-pk="<?= $module->primaryKey ?>" class="btn btn-info addTranslation"
                               title="<?= Yii::t('app', 'Add translation') ?>"><span class="fa fa-plus"></span></a>
                            <a href="<?= Url::to('/admin/translation/delete/' . $module->primaryKey) ?>"
                               class="btn btn-danger confirm-delete" title="<?= Yii::t('app', 'Delete item') ?>"><span
                                        class="fa fa-times"></span></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5">
                    <?= yii\widgets\LinkPager::widget([
                        'pagination' => $data->pagination
                    ]) ?>
                </td>
            </tr>
            </tfoot>

        </table>
    <?php else : ?>
        <p><?= Yii::t('app', 'No records found') ?></p>
    <?php endif; ?>
</div>
<div id="translationAdd" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?= Yii::t('app', 'Add new translation') ?></h4>
            </div>
            <form autocomplete='off'>
                <div class="modal-body">

                    <input type="hidden" id="pk"/>
                    <div class="form-group">
                        <select class="form-control" id="lang" autocomplete='false'>
                            <option selected hidden>Русский</option>
                            <? foreach ($languages as $language) { ?>
                                <option value="<?= $language->url ?>"
                                        <? if ($language->url == 'ru'){ ?>selected<? } ?>><?= $language->name ?> </option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input name="translation" type="text" id="translation" class="form-control"
                               placeholder="<?= Yii::t('app', "Translation") ?>"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
                    <button type="button" class="btn btn-primary"
                            id="saveTranslation"><?= Yii::t('app', 'Save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>