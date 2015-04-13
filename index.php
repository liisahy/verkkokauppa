<?php 
session_start();
require_once('yhteiset/dbYhteys.php');
require_once('yhteiset/funktiot.php');
require_once('yhteiset/dbFunctions.php');

if(!empty($_POST['email'])&&!empty($_POST['pwd'])){
	if(check_user($_POST['email'], $_POST['pwd'], $DBH)){
		 $_SESSION['kirjautunut'] = 'juujuu';
	}else{
		echo '<script>alert("Login Failure");</script>';
		}
}

if($_GET['action'] == 'logout'){
	unset($_SESSION['kirjautunut']);
	session_destroy();
}
?>
<DOCTYPE html>
<html>
<head>
	<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
	<link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="nav">
		<div class="container">
			<ul class="pull-left">
			  <li><a href="#">Front page</a></li>
			  <li><a href="#">Products</a></li>
			</ul>
			<ul class="pull-right">
			  <?php if ($_SESSION['kirjautunut'] == 'juujuu'): ?>
			  <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=logout">Logout</a></li>
			  <?php else: ?>
			  <li><a id="modal_trigger" href="#modal">Log In</a></li>
			  <?php endif;?>
			  <li><a href="#">Sign Up</a></li>
			  <li><a href="#">Help</a></li>
			</ul>
		</div>
	</div>
			
			<div id="modal" class="popupContainer" style="display:none;">
				<header class="popupHeader">
					<span class="header_title">Login</span>
					<span class="modal_close"><i class="fa fa-times"></i></span>
				</header>
			
				<section class="popupBody">
					<!-- Social Login -->
					<div class="social_login">
						<div class="">
							<a href="#" class="social_box fb">
								<span class="icon"><i class="fa fa-facebook"></i></span>
								<span class="icon_title">Connect with Facebook</span>
								
							</a>

							<a href="#" class="social_box google">
								<span class="icon"><i class="fa fa-google-plus"></i></span>
								<span class="icon_title">Connect with Google</span>
							</a>
						</div>

						<div class="centeredText">
						<span>Or use your Email address</span>
						</div>

						<div class="action_btns">
							<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
							<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
						</div>
					</div>

					<!-- Username & Password Login form -->
					<div class="user_login">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<label>Email</label>
							<input type="text" name="email" />
							<br />

							<label>Password</label>
							<input type="password" name="pwd" />
							<br />

							<div class="checkbox">
								<input id="remember" type="checkbox" />
								<label for="remember">Remember me on this computer</label>
							</div>

							<div class="action_btns">
								<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
								<div class="one_half last"><input type="submit" name="login" value="Login" class="btn btn_red" />
								</div>		
							</div>
						</form>

						<a href="#" class="forgot_password">Forgot password?</a>
					</div>

					<!-- Register Form -->
					<div class="user_register">
						<form>
							<label>Full Name</label>
							<input type="text" />
							<br />

							<label>Email Address</label>
							<input type="email" />
							<br />

							<label>Password</label>
							<input type="password" />
							<br />

							<div class="checkbox">
								<input id="send_updates" type="checkbox" />
								<label for="send_updates">Send me occasional email updates</label>
							</div>

							<div class="action_btns">
								<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
								<div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
							</div>
						</form>
					</div>
				</section>
			</div>	
	<script type="text/javascript" src="js/login.js"></script>

    <div class="jumbotron">
      <div class="container">
        <h1>Unicornland</h1>
        <p>Welcome to our online store where everything is made from happiness and fairy dust</p>
        <a href="#">Learn More</a>
      </div>
    </div>
    <div class="neighborhood-guides">
        <div class="container">
            <h2>Products</h2>
            <p>Our extensive catalog where you'll find everything you need</p>
            
            <div class="row">
                <div class = "col-md-4">
                    <div class = "thumbnail">
                        <img src="http://goo.gl/0sX3jq">
                    </div>
                      <div class = "thumbnail">
                        <img src="http://goo.gl/an2HXY">
                    </div>
                </div>
                <div class = "col-md-4">
                    <div class = "thumbnail">
                        <img src="http://goo.gl/Av1pac">
                    </div>
                      <div class = "thumbnail">
                        <img src="http://goo.gl/vw43v1">
                    </div>
                </div>
                <div class = "col-md-4">
                    <div class = "thumbnail">
                        <img src="http://goo.gl/0Kd7UO">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="learn-more">
	  <div class="container">
		<div class="row">
	      <div class="col-md-4">
			<h3>Travel</h3>
			<p>From apartments and rooms to treehouses and boats: stay in unique spaces in 192 countries.</p>
			<p><a href="#">See how to travel on Airbnb</a></p>
	      </div>
		  <div class="col-md-4">
			<h3>Host</h3>
			<p>Renting out your unused space could pay your bills or fund your next vacation.</p>
			<p><a href="#">Learn more about our company</a></p>
		  </div>
		  <div class="col-md-4">
			<h3>Trust and Safety</h3>
			<p>From Verified ID to our worldwide customer support team, we've got your back.</p>
			<p><a href="#">Learn about trust at Airbnb</a></p>
		  </div>
	    </div>
	  </div>
	</div>
  </body>
</html>