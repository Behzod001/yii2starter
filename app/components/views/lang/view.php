

<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=mb_strtoupper($current->name,'UTF-8')?> (<?=$current->url?>) <i
            class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu pull-right">
    <?php foreach ($langs as $lang):?>
        <li>
            <a href="/<?=$lang->url?><?=Yii::$app->getRequest()->getLangUrl()?>" title="<?= $lang->name;?>"><?=mb_strtoupper($lang->name,'UTF-8')?></a>
        </li>
    <?php endforeach;?>
</ul>