<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Amanda">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/amanda/img/amanda-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/amanda">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">


    <title>Administration</title>

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
            <h5 id="mtsg" class="tx-gray-800 mg-b-25">Connexion</h5>

            <div class="form-group">
              <label class="form-control-label">Nom d'utilisateur :</label>
              <input type="text" id="username" name="email" class="form-control" placeholder="Entrer votre nom d'utilisateur">
            </div><!-- form-group -->

            <div class="form-group">
              <label class="form-control-label">Mot de passe :</label>
              <input type="password" id="password" class="form-control" placeholder="Entrer votre mot de passe">
            </div><!-- form-group -->

            <div class="form-group mg-b-20"><a href="">Reinitialiser mot de passe</a></div>

            <button type="submit" id="login-button" class="btn btn-block">Se logger</button>
          </div><!-- col-7 -->
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
	$('#mtsg').html('Staff Canteen Administration');
});
 $("#login-button").click(function(event){
	event.preventDefault();
	var password = $("#password").val();
	var login = $("#username").val();
	
	if(password != '' && '' != login) {
		
		$('form').fadeOut(500);
		$('.wrapper').addClass('form-success');
		$.post( "verifylogin", { username: login, password: password }).done(function( data ) {
			//alert( "Data Loaded: " + data );
			if(data != 'false') {
				setTimeout(function(){
					$(location).attr('href', '<?php echo base_url(); ?>index.php/dashboard');
					return false;
				}, 2000);
			} else {
				$('form').fadeIn(500);
				$('.wrapper').removeClass('form-success');
			}
		  });
		
	} else {
		if(login == '') {
			$('#mtsg').html('Login manquant...');
			$('#mtsg').addClass('error');
			$('#username').addClass('error');
		}
		if(password == '') {
			$('#mtsg').html('Mot de passe manquant...');
			$('#mtsg').addClass('error');
			$('#password').addClass('error');
		}
	}
	
});
</script>
  </body>
</html>
