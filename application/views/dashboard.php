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
    <meta name="twitter:image" content="http://themepixels.me/amanda/img/amanda-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/amanda">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/amanda/img/amanda-social.png">
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
    <link href="<?php echo base_url(); ?>assets/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/amanda.css">
  </head>

  <body>

    <div class="am-header">
      <div class="am-header-left">
        <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
        <a href="index.html" class="am-logo">Administration des matchs</a>
      </div><!-- am-header-left -->

      <div class="am-header-right">
        <div class="dropdown dropdown-notification">
          <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
            <i class="icon ion-ios-bell-outline tx-24"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
            <!-- end: if statement -->
          </a>
          <!--<div class="dropdown-menu wd-300 pd-0-force">
            <div class="dropdown-menu-header">
              <label>Notifications</label>
              <a href="">Mark All as Read</a>
            </div>

            <div class="media-list">
              
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="<?php echo base_url(); ?>assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                    <span class="tx-12">October 03, 2017 8:45am</span>
                  </div>
                </div>
              </a>
              
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="<?php echo base_url(); ?>assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Mellisa Brown</strong> appreciated your work <strong class="tx-medium">The Social Network</strong></p>
                    <span class="tx-12">October 02, 2017 12:44am</span>
                  </div>
                </div>
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="<?php echo base_url(); ?>assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0">20+ new items added are for sale in your <strong class="tx-medium">Sale Group</strong></p>
                    <span class="tx-12">October 01, 2017 10:20pm</span>
                  </div>
                </div>
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="<?php echo base_url(); ?>assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium">Ronnie Mara</strong></p>
                    <span class="tx-12">October 01, 2017 6:08pm</span>
                  </div>
                </div>
              </a>
              <div class="media-list-footer">
                <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
              </div>
            </div>
          </div>--><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <div class="dropdown dropdown-profile">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img src="<?php echo base_url(); ?>assets/img/img3.jpg" class="wd-32 rounded-circle" alt="">
            <span class="logged-name"><span class="hidden-xs-down">Jane Doe</span> <i class="fa fa-angle-down mg-l-3"></i></span>
          </a>
          <div class="dropdown-menu wd-200">
            <ul class="list-unstyled user-profile-nav">
              <!--<li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
              <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
              <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>-->
              <li><a href="<?php echo base_url(); ?>index.php/dashboard/logout/"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- am-header-right -->
    </div><!-- am-header -->

    <div class="am-sideleft">
      <ul class="nav am-sideleft-tab" style="background-color:#2d3a50">
        <li class="nav-item">
          <a href="#mainMenu" class="nav-link active"><i class="icon ion-ios-home-outline tx-24"></i></a>
        </li><!--
        <li class="nav-item">
          <a href="#emailMenu" class="nav-link"><i class="icon ion-ios-email-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
          <a href="#chatMenu" class="nav-link"><i class="icon ion-ios-chatboxes-outline tx-24"></i></a>
        </li>-->
        <li class="nav-item">
          <a href="#settingMenu" class="nav-link"><i class="icon ion-ios-gear-outline tx-24"></i></a>
        </li>
      </ul>

      <div class="tab-content">
        <div id="mainMenu" class="tab-pane active">
          <?php include ('inc/menu.php'); ?>
        </div><!-- #mainMenu -->
		
		<?php include('inc/parametres-rapides.php') ?>
        
		<!-- #settingMenu -->
      </div><!-- tab-content -->
  </div><!-- am-sideleft -->

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title"><?php echo $title; ?></h5>
        
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
        <div class="row row-sm">
          <div class="col-lg-4">
            <div class="card">
              <div id="rs1" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Pronostics effectués ce jour</h6>
                    <p class="tx-12"><?php echo strftime("%A") . " " . strftime("%e") . " " . strftime("%B") . " " . strftime("%Y") ; ?></p>
                  </div>
                  <a href="#" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">152</h2>
                <p class="tx-12 mg-b-0">Pour un total de 68 pronostiqueurs</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card">
              <div id="rs2" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Rencontre du jour</h6>
                    <p class="tx-12">Prochain Match à 16h50</p>
                  </div>
                  <a href="#" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">2</h2>
                <p class="tx-12 mg-b-0">Allemagne - Brésil</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card">
              <div id="rs3" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Nombre total de pronostiqueurs</h6>
                    <p class="tx-12">Dernière inscription à 15h45</p>
                  </div>
                  <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato">856</h2>
                <p class="tx-12 mg-b-0">102 pronostiqueurs inactifs</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
        </div><!-- row -->

       
        <div class="row row-sm mg-t-15 mg-sm-t-20">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Historique des pronostiques</h6>
              </div><!-- card-header -->
              <div class="table-responsive">
                <table class="table table-white mg-b-0 tx-12">
                  <tbody>
                    <tr>
                      <td class="pd-l-20 tx-center">
                        <img src="<?php echo base_url(); ?>assets/img/img1.jpg" class="wd-36 rounded-circle" alt="Image">
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Patient Assontia</a>
                        <span class="tx-11 d-block">Mode : Vainqueur</span>
                      </td>
                      <td class="tx-12">
                        <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Allemagne - Bresil
                      </td>
                      <td>A l'instant</td>
                    </tr>
                    <tr>
                      <td class="pd-l-20 tx-center">
                        <img src="<?php echo base_url(); ?>assets/img/img2.jpg" class="wd-36 rounded-circle" alt="Image">
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Albin Tchopba</a>
                        <span class="tx-11 d-block">Mode : Score</span>
                      </td>
                      <td class="tx-12">
                        <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Allemagne - Brésil
                      </td>
                      <td>25 Mars 2017 à 8:34</td>
                    </tr>
                    <tr>
                      <td class="pd-l-20 tx-center">
                        <img src="<?php echo base_url(); ?>assets/img/img3.jpg" class="wd-36 rounded-circle" alt="Image">
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Gorgonio Magalpok</a>
                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                      </td>
                      <td class="tx-12">
                        <span class="square-8 bg-success mg-r-5 rounded-circle"></span> Purchased success
                      </td>
                      <td>Apr 10, 2017 4:40pm</td>
                    </tr>
                    <tr>
                      <td class="pd-l-20 tx-center">
                        <img src="<?php echo base_url(); ?>assets/img/img5.jpg" class="wd-36 rounded-circle" alt="Image">
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block">Ariel T. Hall</a>
                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                      </td>
                      <td class="tx-12">
                        <span class="square-8 bg-warning mg-r-5 rounded-circle"></span> Payment on hold
                      </td>
                      <td>Apr 02, 2017 6:45pm</td>
                    </tr>
                    <tr>
                      <td class="pd-l-20 tx-center">
                        <img src="<?php echo base_url(); ?>assets/img/img4.jpg" class="wd-36 rounded-circle" alt="Image">
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block">John L. Goulette</a>
                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                      </td>
                      <td class="tx-12">
                        <span class="square-8 bg-pink mg-r-5 rounded-circle"></span> Account deactivated
                      </td>
                      <td>Mar 30, 2017 10:30am</td>
                    </tr>
                    <tr>
                      <td class="pd-l-20 tx-center">
                        <img src="<?php echo base_url(); ?>assets/img/img5.jpg" class="wd-36 rounded-circle" alt="Image">
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block">John L. Goulette</a>
                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                      </td>
                      <td class="tx-12">
                        <span class="square-8 bg-pink mg-r-5 rounded-circle"></span> Account deactivated
                      </td>
                      <td>Mar 30, 2017 10:30am</td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- table-responsive -->
              <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">
                <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Transaction History</a>
              </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col-8 -->
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card pd-20">
              <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-15">Sales Report</h6>
              <div class="d-flex mg-b-10">
                <div class="bd-r pd-r-10">
                  <label class="tx-12">Today</label>
                  <p class="tx-lato tx-inverse tx-bold">1,898</p>
                </div>
                <div class="bd-r pd-x-10">
                  <label class="tx-12">This Week</label>
                  <p class="tx-lato tx-inverse tx-bold">32,112</p>
                </div>
                <div class="pd-l-10">
                  <label class="tx-12">This Month</label>
                  <p class="tx-lato tx-inverse tx-bold">72,067</p>
                </div>
              </div><!-- d-flex -->
              <div class="progress mg-b-10">
                <div class="progress-bar wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
              </div>
              <p class="tx-12 mg-b-0">Maecenas tempus, tellus eget condimentum rhoncus</p>
            </div><!-- card -->

            <ul class="list-group widget-list-group bg-info mg-t-20">
              <li class="list-group-item rounded-top-0">
                <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium">Retina: 13.3-inch</strong> <span class="text-muted">Display</span></p>
              </li>
              <li class="list-group-item">
                <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium">Intel Iris Graphics 6100</strong> <span class="text-muted">Graphics</span></p>
              </li>
              <li class="list-group-item">
                <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium">500 GB</strong> <span class="text-muted">Flash Storage</span></p>
              </li>
              <li class="list-group-item">
                <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium">3.1 GHz Intel Core i7</strong> <span class="text-muted">Processor</span></p>
              </li>
              <li class="list-group-item rounded-bottom-0">
                <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-tx-medium">16 GB 1867 MHz DDR3</strong> <span class="text-muted">Memory</span></p>
              </li>
            </ul>
          </div><!-- col-4 -->
        </div><!-- row -->

      </div><!-- am-pagebody -->
       <div class="am-footer">
        <span>Copyright &copy;. All Rights Reserved. Brasseries du Cameroun Dashboard.</span>
        <span>Created by: DIGITAL EXPERIENCE, SARL.</span>
      </div><!-- am-footer -->
    </div><!-- am-mainpanel -->

    <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery-toggles/toggles.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/d3/d3.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/rickshaw/rickshaw.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="<?php echo base_url(); ?>assets/lib/gmaps/gmaps.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/Flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/amanda.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ResizeSensor.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
  </body>
</html>
