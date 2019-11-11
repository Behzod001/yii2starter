<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 02.06.2019
 * Time: 17:24
 */
$this->title = Yii::t('app','Teach center');
$this->registerCss('.maindata{text-transform:upperccase;}');
$company = $this->company;
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
                    <p class="maindata"> <b> <?=Yii::t('app','Visitors')?> </b></p>
                    <h2><span class="animate-number" data-value="<?= rand(8, 90) ?>" data-duration="3000">0</span></h2>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa "></i>
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
                    <p class="maindata"> <?=Yii::t('app','All')?> <b> <?=Yii::t('app','Subjects')?></b></p>
                    <h2><span class="animate-number" data-value="<?= \app\models\Subject::subjectsCount() ?>"
                              data-duration="3000">0</span></h2>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa "></i>
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
                    <p class="maindata"><?=Yii::t('app','All')?> <b> <?=Yii::t('app','Groups')?> </b></p>
                    <h2><span class="animate-number" data-value="<?= \app\models\Groups::groupsCount() ?>"
                              data-duration="3000">0</span></h2>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa "></i>
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
                    <i class="icon-user"></i>
                </div>
                <div class="text-box">
                    <p class="maindata"><?=Yii::t('app','All')?> <b> <?=Yii::t('app','Listeners')?></b></p>
                    <h2><span class="animate-number" data-value="<?= \app\models\User::usersCount() ?>"
                              data-duration="3000">0</span></h2>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <i class="fa "></i>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>
<!-- End of info box -->


<div class="row">

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header transparent">
                <h2><strong><?= Yii::t('app', 'All') ?></strong> <?= Yii::t('app', 'active groups') ?></h2>
                <div class="additional-btn">
                    <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                    <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                </div>
            </div>
            <div class="widget-content">

                <div class="table-responsive">
                    <table data-sortable class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th><?=Yii::t('app','Subject')?></th>
                            <th><?=Yii::t('app','Group')?></th>
                            <th><?=Yii::t('app','Days complete')?></th>
                            <th><?=Yii::t('app','Status progress')?></th>
                            <th><?=Yii::t('app','Status')?></th>
                            <!--                            <th>Action</th>-->
                        </tr>
                        </thead>

                        <tbody>
                        <? if ($company && count($company->groups) > 0) $number = 1;
                        foreach ($company->groups as $group) {
                            $d = new \vendor\activate\DateCalculate(strtotime($group->start_day),strtotime($group->end_day));

                            ?>
                            <tr>
                                <td><?= $number++; ?></td>
                                <td><?= $group->subject->name ?></td>
                                <td><?= $group->name ?></td>
                                <td><?=  $d->diff; ?> <?=Yii::t('app','days completed')?></td>
                                <td style="width: 30%;">
                                    <div class="progress no-rounded progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                             aria-valuenow="<?= $d->diff;?>" aria-valuemin="0"
                                             aria-valuemax="<?=$d->getExpiredDays();?>" style="width: <?= $d->diff; ?>%">
                                            <span class="sr-only"><?= $d->diff; ?>% Complete (success)</span>
                                        </div>
                                        <!-- .progress-bar .progress-bar-success -->
                                    </div>
                                </td>
                                <td><span class="label label-success">Active</span></td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
