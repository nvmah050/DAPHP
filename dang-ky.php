
<?php 
  	require_once __DIR__. "/autoload/autoload.php"; 


  	if (isset($_SESSION['name_id']))
	{	
		echo "<script>alert('Bạn đã có tài khoản, nên không được vào đây!'); location.href='index.php'</script>";	
	}
  	//xử lý
  	$data =
	[
		"name" => postInput('name'),
		"email" => postInput("email"),
		"phone" =>postInput("phone"),
		"password" => (postInput("password")),
		"address" => postInput("address"),
	];
	$error=[];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$error = [];

		if($data['name'] =='')
		{
			$error['name'] = "Bạn chưa nhập tên sản phẩm";
		}
		if($data['email']=='')
		{
			$error['email'] = "Bạn chưa nhập Email";
		}
		else
		{
			$is_check =  $db->fetchOne("users", " email = '".$data['email']."' ");
			if ($is_check != NULL)
			{
				$error['email'] = "Email đã tồn tại. Mời bạn nhập Email khác!";		
			}	
		}
		if($data['phone']=='')
		{
			$error['phone'] = "Bạn chưa nhập số điện thoại";
		}
		if($data['password']=='')
		{
			$error['password'] = "Bạn chưa nhập mật khẩu";
		}
		else
		{
			$data['password'] = md5(postInput("password"));	
		}
		if($data['address']=='')
		{
			$error['address'] = "Bạn chưa nhập địa chỉ";
		}

		//không có lỗi xảy ra
		if (empty($error))
		{

			$id_insert = $db->insert("users", $data);
			if ($id_insert)
			{
				$_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập lại!!!";
				header("location: dang-nhap.php");
			}else
			{
				
			}			
		}
	}	


?>
<?php   require_once __DIR__. "/layouts/header.php"; ?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href=""> Đăng Ký Thành Viên </a> </h3>
        <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
        	<div class="form-group">
        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Tên Thành Viên: </label>
        			<div class="col-md-5">
        				<input type="text" name="name" placeholder="Trần Sang!" class="form-control" value="<?php echo $data['name'] ?>">
        				<?php if (isset($error['name'])): ?>
							<p class="text-danger" style="margin-top: 5px" style="margin-bottom: -10"><?php echo $error['name'] ?></p>
						<?php endif ?>
        			</div>
        	</div>
        	<div class="form-group">
        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Email: </label>
        			<div class="col-md-5">
        				<input type="email" name="email" placeholder="phuprokute123456789@gmail.com" class="form-control" value="<?php echo $data['email'] ?>">
        				<?php if (isset($error['email'])): ?>
							<p class="text-danger" style="margin-top: 5px" style="margin-bottom: -10"><?php echo $error['email'] ?></p>
						<?php endif ?>
        			</div>
        	</div>
        	<div class="form-group">
        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Mật Khẩu: </label>
        			<div class="col-md-5">
        				<input type="password" name="password" placeholder="Mời bạn nhập mật khẩu!" class="form-control" value="<?php echo $data['password'] ?>">
        				<?php if (isset($error['password'])) : ?>
							<p class="text-danger"><?php echo $error['password'] ?></p>
						<?php endif ?>
        			</div>
        	</div>
        	<div class="form-group">
        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Số Điện Thoại: </label>
        			<div class="col-md-5">
        				<input type="number" name="phone" placeholder="Mời bạn nhập số điện thoại!" class="form-control" value="<?php echo $data['phone'] ?>">
        				<?php if (isset($error['phone'])) : ?>
							<p class="text-danger"><?php echo $error['phone'] ?></p>
						<?php endif ?>
        			</div>
        	</div>
        	<div class="form-group">
        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Địa Chỉ: </label>
        			<div class="col-md-5">
        				<input type="text" name="address" placeholder="Mời bạn nhập địa chỉ!" class="form-control" value="<?php echo $data['address'] ?>">
        				<?php if (isset($error['address'])) : ?>
							<p class="text-danger"><?php echo $error['address'] ?></p>
						<?php endif ?>
        			</div>
        	</div>
        	<button type="submit" class="btn btn-success col-md-1 col-md-offset-5" style="margin-bottom: 20px">Đăng ký </button>
        </form>
         <!-- Nội Dung -->
    </section>
</div>
<?php   require_once __DIR__. "/layouts/footer.php"; ?>     
