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
			<?php if(isset($alert)) echo $alert; ?>
			<div class="form-layout">
			  <div class="row mg-b-25">
				<div class="col-lg-4">
					<div class="form-group mg-b-10-force">
					  <label class="form-control-label">Comp&eacute;tition : <span class="tx-danger">*</span></label>
					  <select class="form-control select2" name="id_competition" data-placeholder="S&eacute;lectionnez la comp&eacute;tition">
						<option label="Sélectionnez la comp&eacute;tition"></option>
							<?php foreach ($lstCompetitions as $competition) { 
								echo "<option value='".$competition->id."'>".$competition->nom."</option>";           	
							} ?>
					  </select>
					</div>
              </div>
			  </div>
			  <div class="row mg-b-25">
				<div class="col-lg-4">
					<div class="form-group mg-b-10-force">
					  <label class="form-control-label">Stade : <span class="tx-danger">*</span></label>
					  <select class="form-control select2" name="id_stade" data-placeholder="S&eacute;lectionnez le stade">
						<option label="Sélectionnez le stade"></option>
							<?php foreach ($lstStades as $stade) { 
								echo "<option value='".$stade->id."'>".$stade->nom."</option>";           	
							} ?>
					  </select>
					</div>
              </div>
			  </div>
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
					Mis en avant
					<div class="col-lg-3">
					  <label class="rdiobox"><input type="radio" value="1" name="en_avant" <?php if (isset($current) && $current->en_avant == "1") { echo "checked"; } ?> /><span>Oui</span></label>
					</div><!-- col-3 -->
					<div class="col-lg-3 mg-t-20 mg-lg-t-0">
					  <label class="rdiobox"><input type="radio" value="0" name="en_avant" <?php if (isset($current) && $current->en_avant == "0") { echo "checked"; } ?> /><span>Non</span></label>
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
	  

     

    </div><!-- am-mainpanel -->
 <div class="am-footer">
        <span>Copyright &copy;. All Rights Reserved. Brasseries du Cameroun Dashboard.</span>
        <span>Created by: DIGITAL EXPERIENCE, SARL.</span>
      </div><!-- am-footer -->
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

