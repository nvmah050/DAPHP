<header>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" type="text/css" href="../public/frontend/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../public/frontend/css/bootstrap.min.css">
	<script  src="../public/frontend/js/jquery-3.2.1.min.js"></script>
	<script  src="../public/frontend/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
</header>

<div class="container">
	<div class="card card-container">
		
		<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
		<p id="profile-name" class="profile-name-card"></p>

		<form class="form-signin" action="" method="POST">
			<span id="reauth-email" class="reauth-email"></span>
			<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="<?php echo $data['email'] ?>" required autofocus>
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" value="<?php echo $data['password'] ?>" required>
			<div id="remember" class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
		</form><!-- /form -->
		<a href="#" class="forgot-password">
			Forgot the password?
		</a>
	</div><!-- /card-container -->
    </div><!-- /container -->