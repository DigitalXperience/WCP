<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <!--<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name->firstname; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            
			<li <?php if($this->uri->uri_string() == 'dashboard') { ?> class="active" <?php } ?>> <a href="<?php echo base_url(); ?>index.php/dashboard"> <i class="fa fa-dashboard"></i> <span>Tableau de Bord</span> </a></li>
            <li class="treeview <?php if($this->uri->uri_string() == 'users' || $this->uri->uri_string() == 'account' || $this->uri->uri_string() == 'account/newaccount' || $this->uri->uri_string() == 'users/newuser') { echo "active"; } ?>">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Utilisateurs & Comptes</span>
              </a>
              <ul class="treeview-menu ">
                <li <?php if($this->uri->uri_string() == 'users') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/users"><i class="fa fa-users"></i> Liste Utilisateurs</a></li>
				<li <?php if($this->uri->uri_string() == 'users/newuser') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/users/newuser"><i class="fa fa-user-plus"></i> Nouvel Utilisateur</a></li>
				<li <?php if($this->uri->uri_string() == 'account/newaccount') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/account/newaccount"><i class="fa fa-user"></i> Créer Compte</a></li>
				<li <?php if($this->uri->uri_string() == 'account') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/account"><i class="fa fa-circle-o"></i> Solde des Comptes</a></li>
              </ul>
            </li>
            <li <?php if($this->uri->uri_string() == 'parameters') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/parameters"><i class="fa fa-gears"></i> Parametres</a></li>
            <li class="treeview <?php if($this->uri->uri_string() == 'juices' || $this->uri->uri_string() == 'juices/report' || $this->uri->uri_string() == 'juices/newjuice') { echo "active"; } ?>">
              <a href="#">
                <i class="fa fa-coffee"></i>
                <span>Gestion Boissons</span>
              </a>
              <ul class="treeview-menu ">
                <li <?php if($this->uri->uri_string() == 'juices') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/juices"><i class="fa fa-coffee"></i> Liste des boissons</a></li>
				<li <?php if($this->uri->uri_string() == 'juices/newjuice') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/juices/newjuice"><i class="fa fa-user-plus"></i> Nouvelle Boisson</a></li>
				<li <?php if($this->uri->uri_string() == 'juices/report') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/juices/report"><i class="fa fa-files-o"></i> Rapport boissons</a></li>
              </ul>
            </li>
			<li <?php if($this->uri->uri_string() == 'report/logs') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/report/logs"><i class="fa fa-file-text-o"></i> Historiques</a></li>
			<li <?php if($this->uri->uri_string() == 'report/filter') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/report/filter"><i class="fa fa-files-o"></i> Rapports</a></li>
			<li <?php if($this->uri->uri_string() == 'report') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/report/weekstats"><i class="fa fa-pie-chart"></i> Statistiques</a></li>
			
			
       </ul>
    </section>
  </aside>-->
  
  
  
  
  <ul class="nav am-sideleft-menu">
            <li class="nav-item">
              <a href="index.html" class="nav-link">
                <i class="icon ion-ios-home-outline"></i>
                <span>Tableau de Bord</span>
              </a>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-gear-outline"></i>
                <span>Paramètres</span>
              </a>
              <ul class="nav-sub">
                <li class="nav-item"><a href="form-elements.html" class="nav-link">Gestion des points</a></li>
              </ul>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-filing-outline"></i>
                <span>Gestion des équipes</span>
              </a>
              <ul class="nav-sub">
                <li class="nav-item"><a href="equipes/add" class="nav-link">Ajouter une équipe</a></li>
                <li class="nav-item"><a href="equipes/liste" class="nav-link">Lister les équipes</a></li>
              </ul>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-analytics-outline"></i>
                <span>Gestion des rencontres</span>
              </a>
              <ul class="nav-sub">
                <li class="nav-item"><a href="rencontres/add" class="nav-link">Ajouter une rencontre</a></li>
                <li class="nav-item"><a href="rencontres/liste" class="nav-link">Lister les rencontres</a></li>
              </ul>
            </li><!-- nav-item -->
         </ul>