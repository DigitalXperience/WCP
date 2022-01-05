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

	  
	  <form role="form" action="<?php echo base_url().'index.php/stades/ajouter'; ?>" method="post" data-parsley-validate>
	  <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Nouveau stade</h6>
          <p class="mg-b-20 mg-sm-b-30">Entrez les informations du stade</p>
		  <?php if(isset($alert)) echo $alert; ?>
			<div class="form-layout">
			  <div class="row mg-b-25">
				<div class="col-lg-8">
					<div class="form-group mg-b-10-force">
						<label class="form-control-label">Entrez son nom : <span class="tx-danger">*</span></label>
					  <input class="form-control" name="nom" value="<?php if(isset($current)) echo $current->nom; ?>" placeholder="Nom du stade" type="text" required />
					</div>
				</div><!-- col -->
<!--				<div class="col-lg-8">
					<div class="form-group mg-b-10-force">
						<label class="form-control-label">Entrez le lien vers le drapeau : <span class="tx-danger">*</span></label>
						  <input type="text" class="form-control" value="<?php if(isset($current)) echo $current->image; ?>" name="image" placeholder="lien vers le drapeau" required />
					</div>
				</div><!-- col -->
				
				<?php if(isset($current)) echo '<input type="hidden" name="id" value="'.$current->id.'">'; ?>
			  </div>
				
			</div><!-- row -->
			  <div class="form-layout-footer">
				  <button type="submit" class="btn btn-info mg-r-5">Enregistrer</button>
				  <button type="reset" class="btn btn-secondary">Annuler</button>
				</div>
			 </div>
        </div>
	  </form>
      
<!-- am-footer -->
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
    
  </body>
</html>

