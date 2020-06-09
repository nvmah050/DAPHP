<?php 

	require_once __DIR__. "/autoload/autoload.php";
	$key = intval(getInput('key'));
	$qty = intval(getInput('qty'));

	$product = $db->fetchID("product", $key);
	if ($product['number'] >= $qty)
	{
		$_SESSION['cart'][$key]['qty'] = $qty;
		echo 1;	
	}
	else
	{
		echo 0;	
	}
?>