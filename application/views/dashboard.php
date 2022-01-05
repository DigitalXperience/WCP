<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title; ?></title>

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
      <?php include ('inc/header.php'); ?>
    </div><!-- am-header -->

    <div class="am-sideleft">
      <ul class="nav am-sideleft-tab" style="background-color:#2d3a50">
        <li class="nav-item">
          <a href="#mainMenu" class="nav-link active"><i class="icon ion-ios-home-outline tx-24"></i></a>
        </li>
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
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php echo $today_pronos; ?></h2>
                <p class="tx-12 mg-b-0">Pour un total de <?php echo $nb_pronostiqueurs; ?> pronostiqueurs</p>
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
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php echo $today_matchs; ?></h2>
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
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php echo $nb_pronostiqueurs; ?></h2>
                <p class="tx-12 mg-b-0"><?php echo $nb_pronostiqueurs_inactifs; ?> pronostiqueurs inactifs</p>
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
				  <?php if($pronostiques){
                            foreach ($pronostiques as $row){ ?>
                    <tr>
                      <td class="pd-l-20 tx-center">
					  <?php if($row->oauth_provider == 'facebook') { ?>
                        <img src="https://graph.facebook.com/<?php echo $row->oauth_uid; ?>/picture" class="wd-36 rounded-circle" alt="Image">
					  <?php } elseif($row->oauth_provider == 'google') { ?>
                        <img src="<?php echo $row->picture_url; ?>" class="wd-36 rounded-circle" alt="Image">
					  <?php } else { ?>
                        <img src="https://www.33export-foot.com/img/pp.png" class="wd-36 rounded-circle" alt="Image">
					  <?php } ?>
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block"><?php echo $row->nom; ?></a>
                        <span class="tx-11 d-block"><?php if(is_null($row->score_eq1)) {  ?> Vainqueur : <?php echo $row->vainqueur; } else { echo $row->eq1 . " " . $row->score_eq1 . " - "  . $row->score_eq2 . " " . $row->eq2; } ?></span>
                      </td>
                      <td class="tx-12">
                        <span class="square-8 bg-success mg-r-5 rounded-circle"></span> <?php echo $row->eq1; ?> - <?php echo $row->eq2; ?>
                      </td>
                      <td><?php echo ucwords($row->dateheure); ?></td>
                    </tr>
				  <?php } } ?>
                    <!--<tr>
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
                        <img src="assets/img/img5.jpg" class="wd-36 rounded-circle" alt="Image">
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block">John L. Goulette</a>
                        <span class="tx-11 d-block">TRANSID: 1234567890</span>
                      </td>
                      <td class="tx-12">
                        <span class="square-8 bg-pink mg-r-5 rounded-circle"></span> Account deactivated
                      </td>
                      <td>Mar 30, 2017 10:30am</td>
                    </tr>-->
                  </tbody>
                </table>
              </div><!-- table-responsive -->
              <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">
                <a href="<?php echo base_url('index.php/pronostics/liste'); ?>"><i class="fa fa-angle-down mg-r-5"></i>View All Transaction History</a>
              </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col-8 -->
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <!--<div class="card pd-20">
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
              </div>
              <div class="progress mg-b-10">
                <div class="progress-bar wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
              </div>
              <p class="tx-12 mg-b-0">Maecenas tempus, tellus eget condimentum rhoncus</p>
            </div>-->

            <ul class="list-group widget-list-group bg-info ">
			<?php if($last_matchs){
                            foreach ($last_matchs as $row){ ?>
              <li class="list-group-item rounded-top-0">
                <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-medium"><?php echo $row->date; ?> : <?php echo $row->eq1; ?> - <?php echo $row->eq2; ?></strong> <span class="text-muted">(<?php echo $row->score_eq1 . " - " . $row->score_eq2; ?>)</span></p>
              </li>
			<?php } } ?>
             <!--
              <li class="list-group-item rounded-bottom-0">
                <p class="mg-b-0"><i class="fa fa-cube tx-white-7 mg-r-8"></i><strong class="tx-tx-medium">15 Mars : Allemagne - Brésil</strong> <span class="text-muted">(NC)</span></p>
              </li>-->
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
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery-toggles/toggles.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/d3/d3.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/rickshaw/rickshaw.min.js"></script>
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