<?php


	require_once __DIR__. "/autoload/autoload.php";

	if(!isset($_SESSION['name_id']))
	{
		echo "<script>alert(' Hãy đăng nhập để sử dụng chức năng này!!!');location.href='index.php'</srcipt>";
	}
	 //Lấy ID gửi lên từ sản phẩm
	$id=intval(getInput('id'));

	//chi tiết sản phẩm

	$product=$db->fetchID("product",$id);

	//kiểm tra nếu tồn tại giỏ hàng thì cập nhật giỏ hàng


	//ngược lại thì tạo mới
	if( ! isset($_SESSION['cart']['id']))
	{
		//tạo mới giỏ hàng
		$_SESSION['cart'][$id]['name'] 		=	$product['name'];
		$_SESSION['cart'][$id]['thunbar'] 	=	$product['thunbar'];
		$_SESSION['cart'][$id]['qty']		= 	1;
		$_SESSION['cart'][$id]['price'] = ((100-$product['sale']) * $product['price'])/100;

	}
	else
	{
		//cập nhật lại giỏ hàng
		$_SESSION['cart'][$id]['qty']		+= 	1;
	}	

	echo "<script>alert('Bạn đã thêm sản phẩm ".$product['name']." vào giỏ hàng!'); location.href='gio-hang.php'</script>";

?>


