<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Amanda">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http:/themepixels.me/amanda/img/amanda-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http:/themepixels.me/amanda">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http:/themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:secure_url" content="http:/themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">


    <title>Amanda Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/highlightjs/github.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/spectrum/spectrum.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/amanda.css">
  </head>

  <body>

    <div class="am-header">
      <div class="am-header-left">
        <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
        <a href="index.html" class="am-logo">amanda</a>
      </div><!-- am-header-left -->

      <div class="am-header-right">
        <div class="dropdown dropdown-notification">
          <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
            <i class="icon ion-ios-bell-outline tx-24"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
            <!-- end: if statement -->
          </a>
          <div class="dropdown-menu wd-300 pd-0-force">
            <div class="dropdown-menu-header">
              <label>Notifications</label>
              <a href="">Mark All as Read</a>
            </div><!-- d-flex -->

            <div class="media-list">
              <!-- loop starts here -->
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="<?php echo base_url(); ?>assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                    <span class="tx-12">October 03, 2017 8:45am</span>
                  </div>
                </div><!-- media -->
              </a>
              <!-- loop ends here -->
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="<?php echo base_url(); ?>assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Mellisa Brown</strong> appreciated your work <strong class="tx-medium">The Social Network</strong></p>
                    <span class="tx-12">October 02, 2017 12:44am</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="<?php echo base_url(); ?>assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0">20+ new items added are for sale in your <strong class="tx-medium">Sale Group</strong></p>
                    <span class="tx-12">October 01, 2017 10:20pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="<?php echo base_url(); ?>assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium">Ronnie Mara</strong></p>
                    <span class="tx-12">October 01, 2017 6:08pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <div class="media-list-footer">
                <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
              </div>
            </div><!-- media-list -->
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <div class="dropdown dropdown-profile">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img src="<?php echo base_url(); ?>assets/img/img3.jpg" class="wd-32 rounded-circle" alt="">
            <span class="logged-name"><span class="hidden-xs-down">Jane Doe</span> <i class="fa fa-angle-down mg-l-3"></i></span>
          </a>
          <div class="dropdown-menu wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
              <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
              <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
              <li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- am-header-right -->
    </div><!-- am-header -->

    <div class="am-sideleft">
      <ul class="nav am-sideleft-tab">
        <li class="nav-item">
          <a href="#mainMenu" class="nav-link active"><i class="icon ion-ios-home-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
          <a href="#emailMenu" class="nav-link"><i class="icon ion-ios-email-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
          <a href="#chatMenu" class="nav-link"><i class="icon ion-ios-chatboxes-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
          <a href="#settingMenu" class="nav-link"><i class="icon ion-ios-gear-outline tx-24"></i></a>
        </li>
      </ul>

      <div class="tab-content">
        <div id="mainMenu" class="tab-pane active">
          <?php include ('inc/menu.php'); ?>
		 </div><!-- #mainMenu -->
        <div id="emailMenu" class="tab-pane">
          <div class="pd-x-20 pd-y-10">
            <a href="" class="btn btn-orange btn-block btn-compose">Compose Email</a>
          </div>
          <ul class="nav am-sideleft-menu">
            <li class="nav-item">
              <a href="page-inbox.html" class="nav-link">
                <i class="icon ion-ios-filing-outline"></i>
                <span>Inbox</span>
              </a>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="page-inbox.html" class="nav-link">
                <i class="icon ion-ios-filing-outline"></i>
                <span>Drafts</span>
              </a>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="page-inbox.html" class="nav-link">
                <i class="icon ion-ios-paperplane-outline"></i>
                <span>Sent</span>
              </a>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="page-inbox.html" class="nav-link">
                <i class="icon ion-ios-trash-outline"></i>
                <span>Trash</span>
              </a>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="page-inbox.html" class="nav-link">
                <i class="icon ion-ios-filing-outline"></i>
                <span>Spam</span>
              </a>
            </li><!-- nav-item -->
          </ul>

          <label class="pd-x-20 tx-uppercase tx-11 mg-t-10 tx-orange mg-b-0 tx-medium">My Folder</label>
          <ul class="nav am-sideleft-menu">
            <li class="nav-item">
              <a href="page-inbox.html" class="nav-link">
                <i class="icon ion-ios-folder-outline"></i>
                <span>Updates</span>
              </a>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="page-inbox.html" class="nav-link">
                <i class="icon ion-ios-folder-outline"></i>
                <span>Social</span>
              </a>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="page-inbox.html" class="nav-link">
                <i class="icon ion-ios-folder-outline"></i>
                <span>Promotions</span>
              </a>
            </li><!-- nav-item -->
          </ul>
        </div><!-- #emailMenu -->
        <div id="chatMenu" class="tab-pane">
          <div class="chat-search-bar">
            <input type="search" class="form-control wd-150" placeholder="Search chat...">
            <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
          </div><!-- chat-search-bar -->

          <label class="pd-x-15 tx-uppercase tx-11 mg-t-20 tx-orange mg-b-10 tx-medium">Recent Chat History</label>
          <div class="list-group list-group-chat">
            <a href="#" class="list-group-item">
              <div class="d-flex align-items-center">
                <img src="<?php echo base_url(); ?>assets/img/img6.jpg" class="wd-32 rounded-circle" alt="">
                <div class="mg-l-10">
                  <h6>Russell M. Evans</h6>
                  <span>Tuesday, 10:33am</span>
                </div>
              </div><!-- d-flex -->
              <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain...</p>
            </a><!-- list-group-item -->
            <a href="#" class="list-group-item">
              <div class="d-flex align-items-center">
                <img src="<?php echo base_url(); ?>assets/img/img7.jpg" class="wd-32 rounded-circle" alt="">
                <div class="mg-l-10">
                  <h6>James F. Sears</h6>
                  <span>Monday, 4:21pm</span>
                </div>
              </div><!-- d-flex -->
              <p>But who has any right to find fault with a man who chooses to enjoy a pleasure that has...</p>
            </a><!-- list-group-item -->
            <a href="#" class="list-group-item">
              <div class="d-flex align-items-center">
                <img src="<?php echo base_url(); ?>assets/img/img8.jpg" class="wd-32 rounded-circle" alt="">
                <div class="mg-l-10">
                  <h6>Sharon R. Rowe</h6>
                  <span>Sunday, 7:45pm</span>
                </div>
              </div><!-- d-flex -->
              <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising...</p>
            </a><!-- list-group-item -->
            <a href="#" class="list-group-item">
              <div class="d-flex align-items-center">
                <img src="<?php echo base_url(); ?>assets/img/img9.jpg" class="wd-32 rounded-circle" alt="">
                <div class="mg-l-10">
                  <h6>Ruby M. Martin</h6>
                  <span>Sunday, 7:45pm</span>
                </div>
              </div><!-- d-flex -->
              <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising...</p>
            </a><!-- list-group-item -->
            <a href="#" class="list-group-item">
              <div class="d-flex align-items-center">
                <img src="<?php echo base_url(); ?>assets/img/img10.jpg" class="wd-32 rounded-circle" alt="">
                <div class="mg-l-10">
                  <h6>Joslyn C. Mayo</h6>
                  <span>Sunday, 7:45pm</span>
                </div>
              </div><!-- d-flex -->
              <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising...</p>
            </a><!-- list-group-item -->
          </div><!-- list-group -->
          <span class="d-block pd-15 tx-12">Loading messages...</span>

        </div><!-- #chatMenu -->
        <div id="settingMenu" class="tab-pane">
          <div class="pd-x-15">
            <label class="tx-uppercase tx-11 mg-t-10 tx-orange mg-b-15 tx-medium">Quick Settings</label>
            <div class="bd pd-15">
              <h6 class="tx-13 tx-normal tx-gray-800">Daily Newsletter</h6>
              <p class="tx-12">Get notified when someone else is trying to access your account.</p>
              <div class="toggle toggle-light warning"></div>
            </div><!-- bd -->

            <div class="bd pd-15 mg-t-15">
              <h6 class="tx-13 tx-normal tx-gray-800">Call Phones</h6>
              <p class="tx-12">Make calls to friends and family right from your account.</p>
              <div class="toggle toggle-light warning"></div>
            </div><!-- bd -->

            <div class="bd pd-15 mg-t-15">
              <h6 class="tx-13 tx-normal tx-gray-800">Login Notifications</h6>
              <p class="tx-12">Get notified when someone else is trying to access your account.</p>
              <div class="toggle toggle-light warning"></div>
            </div><!-- bd -->

            <div class="bd pd-15 mg-t-15">
              <h6 class="tx-13 tx-normal tx-gray-800">Phone Approvals</h6>
              <p class="tx-12">Use your phone when login as an extra layer of security.</p>
              <div class="toggle toggle-light warning"></div>
            </div><!-- bd -->
          </div>
        </div><!-- #settingMenu -->
      </div><!-- tab-content -->
    </div><!-- am-sideleft -->

    <div class="am-pagetitle">
      <h5 class="am-title">Form Elements</h5>
      <form id="searchBar" class="search-bar" action="index.html">
        <div class="form-control-wrapper">
          <input type="search" class="form-control bd-0" placeholder="Search...">
        </div><!-- form-control-wrapper -->
        <button id="searchBtn" class="btn btn-orange"><i class="fa fa-search"></i></button>
      </form><!-- search-bar -->
    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">
Nouvelle rencontre
		<div class="card pd-20 pd-sm-40 mg-t-50">
          <h6 class="card-body-title">Date Picker</h6>
          <p class="mg-b-20 mg-sm-b-30">The datepicker is tied to a standard form input field. Click on the input to open an interactive calendar in a small overlay. If a date is chosen, feedback is shown as the input's value.</p>

          <p class="mg-b-10">Default Functionality</p>
          <div class="wd-200">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker hasDatepicker" placeholder="MM/DD/YYYY" id="dp1524904927206" type="text">
            </div>
          </div><!-- wd-200 -->

          <p class="mg-b-10 mg-t-30">Set the numberOfMonths option to an integer of 2 or more to show multiple months in a single datepicker.</p>
          <div class="wd-200">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input id="datepickerNoOfMonths" class="form-control hasDatepicker" placeholder="MM/DD/YYYY" type="text">
            </div>
          </div><!-- wd-200 -->

          <p class="mg-t-30 mg-b-10">Display the datepicker embedded in the page instead of in an overlay.</p>
          <div class="fc-datepicker hasDatepicker" id="dp1524904927207"><div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">April</span>&nbsp;<span class="ui-datepicker-year">2018</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th scope="col" class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th scope="col"><span title="Monday">Mo</span></th><th scope="col"><span title="Tuesday">Tu</span></th><th scope="col"><span title="Wednesday">We</span></th><th scope="col"><span title="Thursday">Th</span></th><th scope="col"><span title="Friday">Fr</span></th><th scope="col" class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">1</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">4</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">5</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">6</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">7</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">8</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">9</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">11</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">12</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">13</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">14</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">15</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">18</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">19</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">20</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">21</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">22</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">24</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">25</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">26</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">27</a></td><td class=" ui-datepicker-week-end ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default ui-state-highlight ui-state-active" href="#">28</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">29</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2018"><a class="ui-state-default" href="#">30</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="4" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="#">1</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="4" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="#">2</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="4" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="#">3</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="4" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="#">4</a></td><td class=" ui-datepicker-week-end ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="4" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="#">5</a></td></tr></tbody></table></div></div>
        </div>


<!--
  	<script type="text/javascript" src="https:/cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script type="text/javascript" src="https:/cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
  	<script type="text/javascript" src="https:/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="https:/cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  	<link rel="stylesheet" href="https:/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js" />
  	<link rel="stylesheet" href="https:/cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" />
-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php if(isset($alert)) echo $alert; ?>
			<!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Entrez les informations de la rencontre</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url().'index.php/rencontres/ajouter'; ?>" method="post">
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">
                                <div class="form-group">
                                  <label>Equipe 1 </label>
                                  <select class="form-control" name="equipe_id1" required>
                                    <option value="">Sélectionnez l'équipe 1</option>
                                    <?php foreach ($lstEquipes as $equipe) { 
                         				echo "<option value='".$equipe->id."'>".$equipe->name."</option>";           	
                                    } ?>
                                  </select>
                                </div>
                                
                           </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                  <label>Equipe 2 </label>
                                  <select class="form-control" name="equipe_id2" required>
                                    <option value="">Sélectionnez l'équipe 2</option>
                                    <?php foreach ($lstEquipes as $equipe) { 
                         				echo "<option value='".$equipe->id."'>".$equipe->name."</option>";           	
                                    } ?>
                                  </select>
                                </div>
                                
                           </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                  <label>Date et Heure</label>
                                  <!-- <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
  								<input type="text" class="form-control fc-datepicker" placeholder="YYYY-MM-DD hh:mm:ss" name="date_heure" value="<?php //if(isset($current)) echo $current->date_heure; ?>" required>
									-->
									<div class='input-group date' id='datetimepicker5'>
					                    <input type='text' class="form-control" />
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
                                </div>
                                
                           </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                  <label>Mis en avant</label>
                                  <input type="radio" class="form-control" value="1" name="en_avant" <?php if (isset($current) && $current->en_avant == "1") { echo "checked"; } ?> /> Oui  
                                  <input type="radio" class="form-control" value="0" name="en_avant" <?php if (isset($current) && $current->en_avant == "0") { echo "checked"; } ?> /> Non  
                                </div>
                                
                           </div>

                       </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <?php if(isset($current)) echo '<input type="hidden" name="id" value="'.$current->id.'">'; ?>
                    <button type="submit" class="btn btn-primary">Enregistrer</button> <button type="reset" class="btn btn-default">Annuler</button>
                  </div>
                </form>
              </div><!-- /.box -->
         
		 
		 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <script type="text/javascript">
           /* $(function () {
                $('#datetimepicker5').datetimepicker({
                    defaultDate: "11/1/2013",
                    disabledDates: [
                        moment("12/25/2013"),
                        new Date(2013, 11 - 1, 21),
                        "11/22/2013 00:53"
                    ]
                });
            });*/
        </script>
      
<div class="am-footer">
        <span>Copyright &copy;. All Rights Reserved. Amanda Responsive Bootstrap 4 Admin Dashboard.</span>
        <span>Created by: ThemePixels, Inc.</span>
      </div><!-- am-footer -->
    </div><!-- am-mainpanel -->

    <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery-toggles/toggles.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/highlightjs/highlight.pack.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/select2/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/spectrum/spectrum.js"></script>


    <script src="<?php echo base_url(); ?>assets/js/amanda.js"></script>
    <script>
      $(function(){

        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        / Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        / Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });

        / Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          numberOfMonths: 2
        });

        / Color picker
        $('#colorpicker').spectrum({
          color: '#17A2B8'
        });

        $('#showAlpha').spectrum({
          color: 'rgba(23,162,184,0.5)',
          showAlpha: true
        });

        $('#showPaletteOnly').spectrum({
            showPaletteOnly: true,
            showPalette:true,
            color: '#DC3545',
            palette: [
                ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
                ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
        });

      });
    </script>
  </body>
</html>

