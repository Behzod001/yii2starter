<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 11.03.2019
 * Time: 19:57
 */
use yii\helpers\Url;
?>

<!-- Left Sidebar Start -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!-- Search form -->
        <form role="search" class="navbar-form">
            <div class="form-group">
                <input type="text" placeholder="Search" class="form-control">
                <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <div class="clearfix"></div>
        <!--- Profile -->
        <div class="profile-info">
            <div class="col-xs-4">
                <a href="<?=Url::to('profile')?>" class="rounded-image profile-image"><img
                            src="/src/images/users/user-100.jpg"></a>
            </div>
            <div class="col-xs-8">
                <div class="profile-text">Welcome <b>Admin</b></div>
                <div class="profile-buttons">
                    <a href="javascript:;"><i class="fa fa-envelope-o pulse"></i></a>
                    <a href="#connect" class="open-right"><i class="fa fa-comments"></i></a>
                    <a href="<?=Url::to('sign/out')?>" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
                </div>
            </div>
        </div>
        <!--- Divider -->
        <div class="clearfix"></div>
        <hr class="divider"/>
        <div class="clearfix"></div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li >
                    <a href='<?=Url::to('/admin')?>' class='active'>
                        <i class='icon-home-3'></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-table'></i><span>Item</span> <span
                                class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                    <ul>
                        <li><a href='#'><span>Item</span></a></li>
                    </ul>
                </li>
                <li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-table'></i><span>Item</span> <span
                                class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                    <ul>
                        <li><a href='#'><span>Item</span></a></li>
                    </ul>
                </li>
                <li >
                    <a href='#'>
                        <i class='fa fa-map-marker'></i>
                        <span> Item </span>
                    </a>
                </li>


                <li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-table'></i><span>Item</span> <span
                                class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                    <ul>
                        <li><a href='<?=Url::to("/admin/translation/index")?>'><span>Translation</span></a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="portlets">
            <div id="chat_groups" class="widget transparent nomargin">
                <h2>Chat Groups</h2>
                <div class="widget-content">
                    <ul class="list-unstyled">
                        <li><a href="javascript:;"><i class="fa fa-circle-o text-red-1"></i> Colleagues</a></li>
                        <li><a href="javascript:;"><i class="fa fa-circle-o text-blue-1"></i> Family</a></li>
                        <li><a href="javascript:;"><i class="fa fa-circle-o text-green-1"></i> Friends</a></li>
                    </ul>
                </div>
            </div>

            <div id="recent_tickets" class="widget transparent nomargin">

            </div>
        </div>
        <div class="clearfix"></div>
        <br><br><br>
    </div>
    <div class="left-footer">
        <div class="progress progress-xs">
            <div class="progress-bar bg-green-1" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                 aria-valuemax="100" style="width: 80%">
                <span class="progress-precentage">80%</span>
            </div>

            <a data-toggle="tooltip" title="See task progress" class="btn btn-default md-trigger"
               data-modal="task-progress"><i class="fa fa-inbox"></i></a>
        </div>
    </div>
</div>
<!-- Left Sidebar End -->
