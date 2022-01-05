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

		<form role="form" action="<?php echo base_url().'index.php/rencontres/updatescore/'.$current->id_rencontre; ?>" method="post" data-parsley-validate>
	  <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Mettre à jour le score</h6>
          <p class="mg-b-20 mg-sm-b-30">Entrez les scores obtenus</p>
			<?php if(isset($alert)) echo $alert; ?>
			<div class="form-layout">
			  <div class="row mg-b-25">
				<div class="col-lg-4">
					<div class="form-group mg-b-10-force">
					 <label class="form-control-label">Entrez le score de <?php if(isset($current)) echo $current->equipe_1; ?> : <span class="tx-danger">*</span></label>
					  <input class="form-control" name="score_eq1" value="<?php if(isset($current)) echo $current->score_eq1; ?>" placeholder="Score de <?php if(isset($current)) echo $current->equipe_1; ?>" type="text" required />
					
					</div>
              </div>
			  <div class="col-lg-4">
					<div class="form-group mg-b-10-force">
					  <label class="form-control-label">Entrez le score de <?php if(isset($current)) echo $current->equipe_2; ?> : <span class="tx-danger">*</span></label>
					  <input class="form-control" name="score_eq2" value="<?php if(isset($current)) echo $current->score_eq2; ?>" placeholder="Score de <?php if(isset($current)) echo $current->equipe_2; ?>" type="text" required />
					
					</div>
              </div>
			  <div class="col-lg-4">
				<div class="form-group mg-b-10-force">
					  <label class="form-control-label">Equipe qui ouvre le score : <span class="tx-danger">*</span></label>
					  <select class="form-control select2" name="score_ouverture" data-placeholder="Sélectionnez l'équipe 2">
						<option label="Sélectionnez l'équipe"></option>
							<option value="<?php echo $current->id1; ?>"><?php echo $current->equipe_1; ?></option>;           	
							<option value="<?php echo $current->id2; ?>"><?php echo $current->equipe_2; ?></option>;           	
							
					  </select>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group mg-b-10-force">
					  <label class="form-control-label">Minute d'ouverture du score : <span class="tx-danger">*</span></label>
					  <select class="form-control select2" name="score_min" data-placeholder="Sélectionnez l'intervalle">
						<option label="Sélectionnez l'intervalle"></option>
							<option value="0">-</option>
							<option value="0-15" <?php if($current->score_min == '0-15') echo 'selected="selected"'; ?> >0 - 15</option>
							<option value="15-30" <?php if($current->score_min == '15-30') echo 'selected="selected"'; ?> >15 - 30</option>
							<option value="30-45" <?php if($current->score_min == '30-45') echo 'selected="selected"'; ?> >30 - 45</option>
							<option value="45-60" <?php if($current->score_min == '45-60') echo 'selected="selected"'; ?> >45 - 60</option>
							<option value="60-75" <?php if($current->score_min == '60-75') echo 'selected="selected"'; ?> >60 - 75</option>
							<option value="75-90" <?php if($current->score_min == '75-90') echo 'selected="selected"'; ?> >75 - 90</option>
					  </select>
				</div>
			</div><!-- col -->
				
			  </div>
			  
			  <div class="form-layout-footer">
					
                    <?php if(isset($current)) echo '<input type="hidden" name="id" value="'.$current->id_rencontre.'">'; ?>
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
    <script src="<?php echo base_url(); ?>assets/lib/spectrum/spectrum.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/amanda.js"></script>

    <script type="text/javascript">
      
    </script>

  </body>
</html>

