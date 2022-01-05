<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Administration des matchs</title>

    <!-- vendor css -->
    <link href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/amanda.css">
  </head>

  <body>

    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <h2>Administration des matchs</h2>
              <p>Mise en place des paramètres des matchs et équipe de l'application</p>
              <p>Configuration des points et des pronostiques.</p>

              <hr>
              <p>Vous n'avez pas de comptes ? <br> <a href="#"></a></p>
            </div>
          </div>
		  
          <div class="col-lg-7">
            <form name="form" id="form" action="<?php echo base_url(); ?>verifylogin/" class=""><h5 id="mtsg" class="tx-gray-800 mg-b-25">Connexion</h5>

            <div class="form-group">
              <label class="form-control-label">Nom d'utilisateur :</label>
              <input type="text" id="username" name="username" autocomplete="false" class="form-control" placeholder="Entrer votre nom d'utilisateur">
            </div><!-- form-group -->

            <div class="form-group">
              <label class="form-control-label">Mot de passe :</label>
              <input type="password" id="password" name="username" autocomplete="false" class="form-control" placeholder="Entrer votre mot de passe">
            </div><!-- form-group -->

            <div class="form-group mg-b-20"><a href="">Reinitialiser mot de passe</a></div>

            <button type="submit" id="login-button" class="btn btn-block">Se logger</button>
			</form>
			<div id="logo" class="d-xs-none">
				<img src="<?php echo base_url(); ?>assets/img/logo.jpg" />
			</div>
          </div>
		  <!-- col-7 -->
        </div><!-- row -->
        <p class="tx-center tx-white-5 tx-12 mg-t-15">Copyright &copy; 2018. All Rights Reserved</p>
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/amanda.js"></script>
	<script>
$("#username, #password").keyup(function(event){
	$('#mtsg').html('33 export administration');
});
 $("#login-button").click(function(event){
	event.preventDefault();
	var password = $("#password").val();
	var login = $("#username").val();
	
	if(password != '' && '' != login) {
		$('#password').css('border-color', '#adb5bd');
		$('#username').css('border-color', '#adb5bd');
		$('form').fadeOut(500);
		$('.wrapper').addClass('form-success');
		$.post( "verifylogin", { username: login, password: password }).done(function( data ) {
			alert( "Data Loaded: " + data );
			if(data != 'false') {
				$('#logo').fadeIn(500);
				setTimeout(function(){ //alert('verify login success!');
					$(location).attr('href', '<?php echo base_url(); ?>index.php/dashboard');
					return false;
				}, 2000);
			} else {
				$('#mtsg').html('Connexion impossible! Veuillez reessayer');
				$('#mtsg').addClass('error');
				$('form').fadeIn(500);
				$('.wrapper').removeClass('form-success');
			}
		  });
		
	} else {
		$('#password').css('border-color', '#adb5bd');
		$('#username').css('border-color', '#adb5bd');
		if(login == '') {
			$('#mtsg').html('Login manquant...');
			$('#mtsg').addClass('error');
			$('#username').css('border-color', 'red');
			$('#username').addClass('error');
		} else if(password == '') {
			$('#mtsg').html('Mot de passe manquant...');
			$('#mtsg').addClass('error');
			$('#password').css('border-color', 'red');
			$('#password').addClass('error');
		}
	}
	
});
</script>
  </body>
</html>
