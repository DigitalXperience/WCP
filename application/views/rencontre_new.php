Nouvelle rencontre

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
                                  <input type="text" class="form-control" value="<?php if(isset($current)) echo $current->date_heure; ?>" name="date_heure" placeholder="Entrez sa date et heure" required>
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
<?php include ('inc/footer.php'); ?>
