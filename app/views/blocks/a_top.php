<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 11.03.2019
 * Time: 19:57
 */

use yii\helpers\Url;
?>


<!-- Extra CSS Libraries Start -->
<link href="/src/assets/css/style.css" rel="stylesheet" type="text/css"/>
<!-- Extra CSS Libraries End -->
<link href="/src/assets/css/style-responsive.css" rel="stylesheet"/>

<!-- Modal Start -->
<!-- Modal Task Progress -->
<div class="md-modal md-3d-flip-vertical" id="task-progress">
    <div class="md-content">
        <h3><strong>Task Progress</strong> Information</h3>
        <div>
            <p>CLEANING BUGS</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                     aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80&#37; Complete</span>
                </div>
            </div>
            <p>POSTING SOME STUFF</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                     aria-valuemax="100" style="width: 65%">
                    <span class="sr-only">65&#37; Complete</span>
                </div>
            </div>
            <p>BACKUP DATA FROM SERVER</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                     aria-valuemax="100" style="width: 95%">
                    <span class="sr-only">95&#37; Complete</span>
                </div>
            </div>
            <p>RE-DESIGNING WEB APPLICATION</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                     aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100&#37; Complete</span>
                </div>
            </div>
            <p class="text-center">
                <button class="btn btn-danger btn-sm md-close">Close</button>
            </p>
        </div>
    </div>
</div>

<!-- Modal Logout -->

<div class="md-modal md-just-me" id="logout-modal" style="background-color: white;">
    <div class="md-content">
        <h3><strong><?=Yii::t('app','Logout confirmation')?></strong> </h3>
        <div>
            <p class="text-center"><?=Yii::t('app','Are you sure want to logout from this awesome system?')?></p>
            <p class="text-center">
                <button class="btn btn-danger md-close"><?=Yii::t('app','No')?>!</button>
                <a href="<?= Url::to('/sign/out') ?>" class="btn btn-success md-close"><?=Yii::t('app','Yeah, I\'m sure')?></a>
            </p>
        </div>
    </div>
</div>

<!-- Modal End -->
<!-- Begin page -->
<div id="wrapper">


    <!-- Top Bar Start -->
    <div class="topbar">
        <div class="topbar-left">
            <div class="logo">
                <h1 ><a style="color: #fff;font-size: 25px;" href="<?=\app\components\Url::to('')?>">SmartTraining</a></h1>
            </div>
            <button class="button-menu-mobile open-left">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-collapse2">
                    <ul class="nav navbar-nav hidden-xs">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th"></i></a>
                            <div class="dropdown-menu grid-dropdown">
                                <div class="row stacked">
                                    <div class="col-xs-4">
                                        <a href="javascript:;" data-app="notes-app" data-status="active"><i
                                                    class="icon-edit"></i>Notes</a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="javascript:;" data-app="todo-app" data-status="active"><i
                                                    class="icon-check"></i>Todo List</a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="javascript:;" data-app="calc" data-status="inactive"><i
                                                    class="fa fa-calculator"></i>Calculator</a>
                                    </div>
                                </div>
                                <div class="row stacked">
                                    <div class="col-xs-4">
                                        <a href="javascript:;" data-app="weather-widget" data-status="active"><i
                                                    class="icon-cloud-3"></i>Weather</a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="javascript:;" data-app="calendar-widget2" data-status="active"><i
                                                    class="icon-calendar"></i>Calendar</a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="javascript:;" data-app="stock-app" data-status="inactive"><i
                                                    class="icon-chart-line"></i>Stocks</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="language_bar dropdown hidden-xs">
                        <?=\app\components\LangWidget::widget()?>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right top-navbar">
                        <li class="dropdown iconify hide-phone">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i><span
                                        class="label label-danger absolute">4</span></a>
                            <ul class="dropdown-menu dropdown-message">
                                <li class="dropdown-header notif-header"><i class="icon-bell-2"></i> New Notifications<a
                                            class="pull-right" href="#"><i class="fa fa-cog"></i></a></li>
                                <li class="unread">
                                    <a href="#">
                                        <p><strong>John Doe</strong> Uploaded a photo
                                            <strong>&#34;DSC000254.jpg&#34;</strong>
                                            <br/><i>2 minutes ago</i>
                                        </p>
                                    </a>
                                </li>
                                <li class="unread">
                                    <a href="#">
                                        <p><strong>John Doe</strong> Created an photo album
                                            <strong>&#34;Fappening&#34;</strong>
                                            <br/><i>8 minutes ago</i>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <p><strong>John Malkovich</strong> Added 3 products
                                            <br/><i>3 hours ago</i>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <p><strong>Sonata Arctica</strong> Send you a message <strong>&#34;Lorem ipsum
                                                dolor...&#34;</strong>
                                            <br/><i>12 hours ago</i>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <p><strong>Johnny Depp</strong> Updated his avatar
                                            <br/><i>Yesterday</i>
                                        </p>
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <div class="btn-group btn-group-justified">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-primary"><i class="icon-ccw-1"></i>
                                                Refresh</a>
                                        </div>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-danger"><i class="icon-trash-3"></i> Clear
                                                All</a>
                                        </div>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-success">See All <i
                                                        class="icon-right-open-2"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown iconify hide-phone">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa fa-envelope"></i><span
                                        class="label label-danger absolute">3</span></a>
                            <ul class="dropdown-menu dropdown-message">
                                <li class="dropdown-header notif-header"><i class="icon-mail-2"></i> New Messages</li>
                                <li class="unread">
                                    <a href="#" class="clearfix">
                                        <img src="/src/images/users/chat/2.jpg" class="xs-avatar ava-dropdown"
                                             alt="Avatar">
                                        <strong>John Doe</strong><i class="pull-right msg-time">5 minutes ago</i><br/>
                                        <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                                    </a>
                                </li>
                                <li class="unread">
                                    <a href="#" class="clearfix">
                                        <img src="/src/images/users/chat/1.jpg" class="xs-avatar ava-dropdown"
                                             alt="Avatar">
                                        <strong>Sandra Kraken</strong><i class="pull-right msg-time">22 minutes
                                            ago</i><br/>
                                        <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="/src/images/users/chat/3.jpg" class="xs-avatar ava-dropdown"
                                             alt="Avatar">
                                        <strong>Zoey Lombardo</strong><i class="pull-right msg-time">41 minutes
                                            ago</i><br/>
                                        <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <div class=""><a href="#" class="btn btn-sm btn-block btn-primary"><i
                                                    class="fa fa-share"></i> See all messages</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i
                                        class="icon-resize-full-2"></i></a></li>
                        <li class="dropdown topbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="rounded-image topbar-profile-image"><img
                                            src="<?=$user->avatar?>"></span>
                                <strong><?= $user->firstname . " " . $user->lastname ?></strong>
                                <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= app\components\Url::to('admin/my/profile') ?>">My Profile</a></li>
                                <li><a href="#">Change Password</a></li>
                                <li><a href="#">Account Setting</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= app\components\Url::to('help?') ?>"><i class="icon-help-2"></i> Help</a></li>
                                <li><a href="<?= app\components\Url::to('lock') ?>"><i class="icon-lock-1"></i> Lock me</a></li>
                                <li><a href="#" class="md-trigger" data-modal="logout-modal"><i
                                                class="icon-logout-1"></i> Logout</a></li>
                            </ul>
                        </li>
                        <li class="right-opener">
                            <a href="javascript:;" class="open-right"><i class="fa fa-angle-double-left"></i><i
                                        class="fa fa-angle-double-right"></i></a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
