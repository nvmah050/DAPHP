<?php 
$open = "user";
require_once __DIR__. "/../../autoload/autoload.php";

	/**
	 * danh sách danh mục sản phẩm
	 */
	

	$data =
	[
		"name" => postInput('name'),
		"email" => postInput("email"),
		"phone" =>postInput("phone"),
		"password" => md5(postInput("password")),
		"address" => postInput("address"),
	];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$error = [];

		if(postInput('name')=='')
		{
			$error['name'] = "Bạn chưa nhập tên sản phẩm";
		}
		if(postInput('email')=='')
		{
			$error['email'] = "Bạn chưa nhập Email";
		}
		else
		{
			$is_check =  $db->fetchOne("admin", " email = '".$data['email']."' ");
			if ($is_check != NULL)
			{
				$error['email'] = "Email đã tồn tại";		
			}	
		}
		if(postInput('phone')=='')
		{
			$error['phone'] = "Bạn chưa nhập số điện thoại";
		}
		if(postInput('password')=='')
		{
			$error['password'] = "Bạn chưa nhập mật khẩu";
		}
		if(postInput('address')=='')
		{
			$error['address'] = "Bạn chưa nhập địa chỉ";
		}
		
		

		if ($data['password'] != md5(postInput("re_password")))
		{
			$error['password'] = "Mật khẩu không khớp";
		}


	//không có lỗi xảy ra
		if (empty($error))
		{
			

			$id_insert = $db->insert("users", $data);
			if ($id_insert) {
				$_SESSION['success'] = "Thêm thành công";
				redirectAdmin("user");
			}else{
				$_SESSION['user'] = "Thêm thất bại";
			}			
		}
	}
	?>

	<?php 
	require_once __DIR__. "/../../layouts/header.php";
	?>
	<!--Nội dung -->
	<div class="row">
		<div class="col-lg-12 text-center">
			<h1 class="page-header">
				Thêm mới thành viên
			</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="clearfix"></div>
	<?php require_once __DIR__. "/../../../partials/notification.php"; ?>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6">
			<form role="form" action="" method="POST" enctype="multipart/form-data">

				<div class="form-group">
					<label for="exampleInputEmail1">Họ và tên</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm" name="name" value="<?php echo $data['name'] ?>">
					<?php if (isset($error['name'])): ?>
						<p class="text-danger"><?php echo $error['name'] ?></p>
					<?php endif ?>
				</div>


				<div class="form-group">
					<label for="exampleInputEmail1"> Email </label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="phuprokute123456789@gmail.com" name="email" value="<?php echo $data['email'] ?>">
					<?php if (isset($error['email'])): ?>
						<p class="text-danger"><?php echo $error['email'] ?></p>
					<?php endif ?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"> Phone </label>
					<input type="number" class="form-control" id="exampleInputEmail1" placeholder="0923635200" name="phone" value="<?php echo $data['phone'] ?>">
					<?php if (isset($error['phone'])): ?>
						<p class="text-danger"><?php echo $error['phone'] ?></p>
					<?php endif ?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"> Password </label>
					<input type="password" class="form-control" id="exampleInputEmail1" placeholder="********" name="password" value="<?php echo $data['password'] ?>">
					<?php if (isset($error['password'])): ?>
						<p class="text-danger"><?php echo $error['password'] ?></p>
					<?php endif ?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"> Confim Password </label>
					<input type="password" class="form-control" id="re_password" placeholder="********" name="re_password" required="">
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1"> Address </label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="address" value="<?php echo $data['address'] ?>">
					<?php if (isset($error['address'])): ?>
						<p class="text-danger"><?php echo $error['address'] ?></p>
					<?php endif ?>
				</div>
				
				<button type="submit" class="btn btn-success"> Lưu </button>
			</form>
		</div>
	</div>
	<?php 
	require_once __DIR__. "/../../layouts/footer.php";
	?>