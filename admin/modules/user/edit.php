<?php 
$open = "user";
require_once __DIR__. "/../../autoload/autoload.php";

$id = intval(getInput('id'));
	// _debug($id);

$Edituser = $db->fetchID("users", $id);
if (empty($Edituser)) {
	$_SESSION['error'] = "Dữ liệu không tồn tại";
	redirectAdmin('user');
}
	/**
	 * danh sách danh mục sản phẩm
	 */
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$error = [];

		$data =
		[
			"name" => postInput('name'),
			"email" => postInput("email"),
			"phone" =>postInput("phone"),
			"address" => postInput("address"),
			"level" => postInput("level")
		];

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
			if (postInput('email') != $Edituser['email'])
			{
				$is_check =  $db->fetchOne("users", " email = '".$data['email']."' ");
				if ($is_check != NULL)
				{
					$error['email'] = "Email đã tồn tại";		
				}	
			}	
		}
		if(postInput('phone')=='')
		{
			$error['phone'] = "Bạn chưa nhập số điện thoại";
		}
		
		// if (! isset($_FILES['thumbar'])) {
		// 	$error['thumbar'] = "Bạn chưa chọn hình ảnh";
		// }
		

		// if ($data['password'] != md5(postInput("re_password")))
		// {
		// 	$error['password'] = "Mật khẩu không khớp";
		// }
		if (postInput('password') != NULL && postInput('re_password') != NULL)
		{
			if (postInput('password') != postInput('re_password'))
			{
				$error['password'] = "Mật khẩu thay đổi không khớp";	
			}
			else {
				$data['password'] = md5(postInput('password'));
			}
		}

	//không có lỗi xảy ra
		if (empty($error))
		{
			$file_name = $_FILES['avata']['name'];
			$file_tmp = $_FILES['avata']['tmp_name'];
			$file_type = $_FILES['avata']['type'];
			$file_error = $_FILES['avata']['error'];

			if ($file_error == 0 ) {
				$part = ROOT ."user/";
				$data['avata'] = $file_name;
			}
			
			$id_update = $db->update("user", $data, array("id"=>$id));
			if ($id_update > 0) {
				move_uploaded_file($file_tmp, $part.$file_name);
				$_SESSION['success'] = "cập nhật thành công";
				redirectAdmin("user");
			}else{
				$_SESSION['error'] = "cập nhật thất bại";
				redirectAdmin("user");
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
				Chỉnh sửa sản phẩm
			</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="clearfix"></div>
	<?php require_once __DIR__. "/../../../partials/notification.php"; ?>
	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal style-form" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-sm-3 control-label">Họ và tên</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $Edituser['name']?>" >
						<?php if (isset($error['name'])): ?>
							<p class="text-danger"><?php echo $error['name'] ?></p>
						<?php endif ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label" for="exampleInputEmail1">Ảnh đại diện</label>
					<div class="col-sm-6">
						<input type="file" class="form-control" id="exampleInputEmail1" name="avata">
						<img class="img-circle" src="<?php echo uploads() ?>admin/<?php echo $Edituser['avata'] ?>" alt="" height="100px" width="100px">
						<?php if (isset($error['avata'])): ?>
							<p class="text-danger"><?php echo $error['avata'] ?></p>
						<?php endif ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-6">
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="9.000.000" name="email" value="<?php echo $Edituser['email']?>">
						<?php if (isset($error['email'])): ?>
							<p class="text-danger"><?php echo $error['email'] ?></p>
						<?php endif ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Phone</label>
					<div class="col-sm-6">
						<input type="number" class="form-control" id="exampleInputEmail1" placeholder="9.000.000" name="phone" value="<?php echo $Edituser['phone']?>">
						<?php if (isset($error['phone'])): ?>
							<p class="text-danger"><?php echo $error['phone'] ?></p>
						<?php endif ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="exampleInputEmail1" placeholder="9.000.000" name="password" value="<?php echo $Edituser['password']?>">
						<?php if (isset($error['password'])): ?>
							<p class="text-danger"><?php echo $error['password'] ?></p>
						<?php endif ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Nhập lại Password</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="exampleInputEmail1" placeholder="*******" name="re_password">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Address</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="exampleInputEmail1" name="address" value="<?php echo $Edituser['address']?>">
						<?php if (isset($error['address'])): ?>
							<p class="text-danger"><?php echo $error['address'] ?></p>
						<?php endif ?>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-success btn-lg"> Lưu </button>
				</div>
			</form>
		</div>
	</div>
	<?php 
	require_once __DIR__. "/../../layouts/footer.php";
	?>

<!-- 	 <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 2 ? "selected = 'selected" : '' ?> -->