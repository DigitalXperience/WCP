<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
    <link href="<?php echo base_url(); ?>assets/lib/highlightjs/github.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/spectrum/spectrum.css" rel="stylesheet">

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

		<form role="form" action="<?php echo base_url().'index.php/rencontres/ajouter'; ?>" method="post" data-parsley-validate>
	  <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Nouvelle Rencontre</h6>
          <p class="mg-b-20 mg-sm-b-30">Entrez les informations de la rencontre</p>
			<div class="form-layout">
			  <div class="row mg-b-25">
				<div class="col-lg-4">
					<div class="form-group mg-b-10-force">
					  <label class="form-control-label">Equipe 1 : <span class="tx-danger">*</span></label>
					  <select class="form-control select2" name="equipe_id1" data-placeholder="Sélectionnez l'équipe 1">
						<option label="Sélectionnez l'équipe 1"></option>
							<?php foreach ($lstEquipes as $equipe) { 
								echo "<option value='".$equipe->id."'>".$equipe->name."</option>";           	
							} ?>
					  </select>
					</div>
              </div>
			  <div class="col-lg-4">
					<div class="form-group mg-b-10-force">
					  <label class="form-control-label">Equipe 2 : <span class="tx-danger">*</span></label>
					  <select class="form-control select2" name="equipe_id2" data-placeholder="Sélectionnez l'équipe 2">
						<option label="Sélectionnez l'équipe 2"></option>
							<?php foreach ($lstEquipes as $equipe) { 
								echo "<option value='".$equipe->id."'>".$equipe->name."</option>";           	
							} ?>
					  </select>
					</div>
              </div>
			  <div class="col-lg-4">
					
				</div><!-- col -->
				<div class="col-lg-4">
					<div class="form-group mg-b-10-force">
						<p class="mg-b-10">Date de la rencontre</p>
						<div class="wd-200">
							<div class="input-group">
							  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
							  <input type="text" id="r_date" name="r_date" class="form-control fc-datepicker" placeholder="JJ/MM/AAAA">
							</div>
						  </div>
					  </div>
				</div><!-- col -->
				<div class="col-lg-4">
					<div class="form-group">
					  <label class="form-control-label">Heure de la recontre : <span class="tx-danger">*</span></label>
					  <input class="form-control" type="text" name="r_heure" value="" placeholder="HH:MM">
					</div>
				</div><!-- col-4 -->
			  </div>
			  
			  <div class="row mg-t-10">
					<div class="col-lg-3">
					  <label class="rdiobox">
						<input name="rdio" type="radio">
						<span>Mettre en avant</span>
					  </label>
					</div><!-- col-3 -->
					<div class="col-lg-3 mg-t-20 mg-lg-t-0">
					  <label class="rdiobox">
						<input name="rdio" type="radio" checked>
						<span>Ne pas mettre en avant</span>
					  </label>
					</div>
				  </div><!-- row -->
			  <div class="form-layout-footer">
					
                    <?php if(isset($current)) echo '<input type="hidden" name="id" value="'.$current->id.'">'; ?>
				  <button type="submit" class="btn btn-info mg-r-5">Enregistrer</button>
				  <button type="reset" class="btn btn-secondary">Annuler</button>
				</div>
			 </div>
        </div>
	  </form>
	  

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

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
                                  <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                    <input type="text" id="r_date" name="r_date" class="form-control fc-datepicker" placeholder="YYYY-MM-DD">
                                  </div>
                                  <input type="text" name="r_heure" placeholder="hh:mm" />
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

    <script type="text/javascript">
      $(function () {
        /*$('#r_date').datepicker({
          showOtherMonths: false,
          selectOtherMonths: false,
          format: 'yyyy-mm-dd',
          numberOfMonths: 2
        });*/
		// Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });
      });
	  
	  $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      })
    </script>

  </body>
</html>

