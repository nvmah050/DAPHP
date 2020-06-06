<?php
session_start();
require_once __DIR__. "/../libraries/Database.php";
require_once __DIR__. "/../libraries/Function.php";
$db = new Database;
$error = [];

$data =
[
	"email" => postInput("email"),
	"password" => md5(postInput("password"))
];

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	

	
	if($data['email']=='')
	{
		$error['email'] = "Bạn chưa nhập Email";
	}
	if($data['password']=='')
	{
		$error['password'] = "Bạn chưa nhập mật khẩu";
	}
	
	//không có lỗi xảy ra
	if (empty($error))
	{
		//$data['password'] = md5($data['password']);
		$is_check = $db->fetchOne("admin", " email = '".$data['email']."' AND password = '".$data['password']."'");
		// _debug($is_check);
		if ($is_check != null)
		{
			$_SESSION['admin_name'] = $is_check['email'];
			$_SESSION['admin_id'] = $is_check['id'];
			echo "<script>alert('Đăng nhập thành công'); location.href='/tutphp/admin/'</script>";
		}
		else
		{
			//Đăng nhập thất bại
			echo "<script>alert('Sai Email hoặc mật khẩu. Vui lòng kiểm tra lại');</script>";
		}
	}	
}
?>


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