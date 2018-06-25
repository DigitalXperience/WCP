<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title; ?></title>

    <!-- vendor css -->
    <link href=".<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/highlightjs/github.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/select2/css/select2.min.css" rel="stylesheet">

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
  
  <div class="am-pagetitle">
      <h5 class="am-title"><?php echo $title; ?></h5>
    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"><?php echo $title; ?></h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>#</th>
                    <th>Date/Heure</th>
                    <th>Rencontre</th>
                    <th>Score</th>
                    <th>Utilisateur</th>
                    <th>Vainqueur</th>
                    <th>Date/Heure prono</th>
                    <th>Nb points</th>
                </tr>
              </thead>
              <tbody>
                <?php if($liste){
                            foreach ($liste as $row){
                                echo '<tr id="row-'.$row->id.'">
                                        <td>'.$row->id.'</td>
                                        <td>'.$row->rencontre_date_heure.'</td>
                                        <td>'.$row->equipe_1.' - '.$row->equipe_2.'</td>
                                        <td>'.$row->score_eq1.' - '.$row->score_eq2.'</td>
                                        <td>'.$row->utilisateur_nom.'</td>
                                        <td>'.$row->vainqueur.'</td>
                                        <td>'.$row->date_heure.'</td>
                                        <td>'.$row->pts_obtenus.'</td>
                                      </tr>';
                            }
                    } ?>
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


      </div><!-- am-pagebody -->
      <div class="am-footer">
        <span>Copyright &copy;. All Rights Reserved. 33 Export Dashboard.</span>
        <span>Created by: Digital Experience, Sarl.</span>
      </div><!-- am-footer -->
    </div><!-- am-mainpanel -->

    <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery-toggles/toggles.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/highlightjs/highlight.pack.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/select2/js/select2.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>