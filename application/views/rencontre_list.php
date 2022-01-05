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
          <p class="mg-b-20 mg-sm-b-30"></p>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>#</th>
					<th>Comp&eacute;tition</th>
                    <th>Equipe 1</th>
                    <th>Equipe 2</th>
                    <th>Date</th>
                    <th>Score eq.1</th>
                    <th>Score eq.2</th>
                    <th>Front</th>
                </tr>
              </thead>
              <tbody>
                <?php if($liste){
                            foreach ($liste as $row){
                                echo '<tr id="row-'.$row->id_rencontre.'">
										<td>'.$row->id_rencontre.'</td>
										<td>'.$row->competition_nom.'</td>
                                        <td>'.$row->equipe_1.'</td>
                                        <td>'.$row->equipe_2.'</td>
                                        <td>'.$row->date. ' à ' . $row->heure . '</td>
                                        <td>'; if($row->score_eq1 == "") echo '<a href="' . base_url() . 'index.php/rencontres/updatescore/' . $row->id_rencontre . '">Ajouter</a>'; else echo $row->score_eq1;  echo '</td>
                                        <td>'; if($row->score_eq2 == "") echo '<a href="' . base_url() . 'index.php/rencontres/updatescore/' . $row->id_rencontre . '">Ajouter</a>'; else echo $row->score_eq2;  echo '</td>
                                        <td><a href="' . base_url() . 'index.php/rencontres/en_avant/' . $row->id_rencontre . '">' . ($row->en_avant == '0' ? 'Non' : 'Oui') .'</a></td>
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

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>