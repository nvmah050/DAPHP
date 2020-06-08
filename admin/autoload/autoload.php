<?php
	session_start();
	require_once __DIR__. "/../../libraries/Database.php";
    require_once __DIR__. "/../../libraries/Function.php";
    $db = new Database;

    if (!isset($_SESSION['admin_id']))
    {
    	header("location: /tutphp/login/index.php");	
    }

    $product = $db->fetchAll("product");
    $orders = $db->fetchAll("orders");

    define('ROOT', $_SERVER['DOCUMENT_ROOT']."/tutphp/public/uploads/");

?>