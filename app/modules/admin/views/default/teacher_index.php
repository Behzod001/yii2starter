<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 02.06.2019
 * Time: 19:07
 */

$grt = \app\models\GroupTeachers::findAll(['teacher_id'=>Yii::$app->user->identity->getId()]);

?>

<!-- Start info box -->
<div class="row top-summary">
    <div class="col-lg-3 col-md-6">
        <div class="widget green-1 animated fadeInDown">
            <div class="widget-content padding">
                <div class="widget-icon">
                    <i class="icon-globe-inv"></i>
                </div>
                <div class="text-box">
                    <p class="maindata">TASHRIF <b>BUYURUVCHILAR</b></p>
                    <h2><span class="animate-number" data-value="<?= rand(8, 90) ?>" data-duration="3000">0</span></h2>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa fa-"></i>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="widget darkblue-2 animated fadeInDown">
            <div class="widget-content padding">
                <div class="widget-icon">
                    <i class="icon-book-2"></i>
                </div>
                <div class="text-box">
                    <p class="maindata">UMUMIY <b> FANLAR</b></p>
                    <h2><span class="animate-number" data-value="<?= \app\models\Subject::subjectsCount() ?>"
                              data-duration="3000">0</span></h2>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa fa-"></i>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="widget orange-4 animated fadeInDown">
            <div class="widget-content padding">
                <div class="widget-icon">
                    <i class="icon-group"></i>
                </div>
                <div class="text-box">
                    <p class="maindata">UMUMIY <b>GURUHLAR</b></p>
                    <h2><span class="animate-number" data-value="<?= \app\models\Groups::groupsCount() ?>"
                              data-duration="3000">0</span></h2>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa fa-"></i>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="widget lightblue-1 animated fadeInDown">
            <div class="widget-content padding">
                <div class="widget-icon">
                    <i class="icon-users"></i>
                </div>
                <div class="text-box">
                    <p class="maindata">UMUMIY <b>TINLOVCHILAR</b></p>
                    <h2><span class="animate-number" data-value="<?= \app\models\User::usersCount() ?>"
                              data-duration="3000">0</span></h2>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa fa-"></i>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>
<!-- End of info box -->


<!--my subjects-->

<div class="row top-summary">
    <div class="container">
        <h4 class=" animated fadeInDown"><?=Yii::t('app','My subjects')?></h4>

    </div>
    <?php $subj=[];$index=0;
    foreach ($grt as $g){

    if(!in_array($g->group->subject->id,$subj)){
    $subj[$index++] = $g->group->subject->id;

    ?>
<div class="col-lg-3 col-md-6">
    <div class="widget darkblue-2 animated fadeInDown">
        <div class="widget-content padding">
            <div class="widget-icon">
                <i class="icon-book-1 "></i>
            </div>
            <div class="text-box">
                <p class="maindata"> <b> <?=$g->group->subject->name?></b></p>
                <h2><span class="animate-number" data-value="<?= \app\models\Subject::subjectsCount() ?>"
                          data-duration="3000">0</span></h2>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="widget-footer">
            <div class="row">
                <div class="col-sm-12">
                    <i class="fa fa"></i>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
    <?}}?>
</div>

<!--my subjects end -->

<!--my groups   -->
<div class="row top-summary">
    <div class="container">
        <h4 class=" animated fadeInDown"><?=Yii::t('app','My groups')?></h4>

    </div>
    <?foreach ($grt as $g){?>
    <div class="col-lg-3 col-md-6">
        <div class="widget darkblue-2 animated fadeInDown">
            <div class="widget-content padding">
                <div class="widget-icon">
                    <i class="icon-group-circled"></i>
                </div>
                <div class="text-box">
                    <p class="maindata"><?=$g->group->name?> <b><?=Yii::t('app','Group')?> </b></p>
                    <h2><span class="animate-number" data-value="<?=$g->getAllListeners();?> "
                              data-duration="3000">0</span></h2>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa fa"></i><?=Yii::t('app','Listeners')?> <?=$g->getAllListeners();?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <?}?>
</div>

<!--my groups   end-->