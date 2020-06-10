
<?php 
  require_once __DIR__. "/autoload/autoload.php"; 
  $user=$db->fetchID("users",intval($_SESSION['name_id']));
  
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {	
  	$data=
  	[
  		'amount' => $_SESSION['total'],
  		'users_id' => $_SESSION['name_id'],
  		'note' => postInput("note")
  	];

  	$idtran=$db->insert("transaction",$data);
  	if($idtran >0)
  	{
  		foreach ($_SESSION['cart'] as $key => $value) {
  			$data2 =
  			[
  				'transaction_id'=> $idtran,
  				'product_id'	=> $key,
  				'qty'			=> $value['qty'],
  				'price'			=> $value['price']
  			];

  			$id_insert =$db ->insert("orders",$data2);
  		}
  		
  		$_SESSION['success'] = "Lưu thông tin đơn hàng thành công ! Chúng tôi sẽ liên hệ với bạn sớm nhất!!!";
  		header("location: thong-bao.php");
  	}
  }




?>
   <?php   require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">

            <section class="box-main1">
                <h3 class="title-main"><a href=""> Thanh Toán</a> </h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
		        	<div class="form-group">
		        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Tên Thành Viên: </label>
		        			<div class="col-md-5">
		        				<input type="text" readonly="" name="name" placeholder="Trần Sang!" class="form-control" value="<?php echo $user['name'] ?>">
		        				
		        			</div>
		        	</div>
		        	<div class="form-group">
		        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Email: </label>
		        			<div class="col-md-5">
		        				<input type="email" readonly="" name="email" placeholder="phuprokute123456789@gmail.com" class="form-control" value="<?php echo $user['email'] ?>">
		        				
		        			</div>
		        	</div>
		        	<div class="form-group">
		        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Số Điện Thoại: </label>
		        			<div class="col-md-5">
		        				<input type="number" readonly="" name="phone" placeholder="Mời bạn nhập số điện thoại!" class="form-control" value="<?php echo $user['phone'] ?>">
		        				
		        			</div>
		        	</div>
		        	<div class="form-group">
		        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Địa Chỉ: </label>
		        			<div class="col-md-5">
		        				<input type="text" readonly="" name="address" placeholder="Mời bạn nhập địa chỉ!" class="form-control" value="<?php echo $user['address'] ?>">
		        				
		        			</div>
		        	</div>
		        	<div class="form-group">
		        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Số Tiền: </label>
		        			<div class="col-md-5">
		        				<input type="text" readonly="" name="address" placeholder="Mời bạn nhập địa chỉ!" class="form-control" value="<?php echo formatprice($_SESSION['total']) ?>">
		        				
		        			</div>
		        	</div>
		        	<div class="form-group">
		        			<label class="col-md-2 col-md-offset-1" style="margin-top: 8px">Ghi Chú: </label>
		        			<div class="col-md-5">
		        				<input type="text" name="note" placeholder="Giao hàng tại địa chỉ ....!" class="form-control" value="">
		        				
		        			</div>
		        	</div>
        	<button type="submit" class="btn btn-success col-md-1 col-md-offset-5" style="margin-bottom: 20px">Xác Nhận </button>
        </form>
                
                 <!-- Nội Dung -->
            </section>

        </div>
   <?php   require_once __DIR__. "/layouts/footer.php"; ?>     
