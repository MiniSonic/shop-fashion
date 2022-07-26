<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

//get data
if($_GET){
	$OptionValue = $_GET['option'];
	//check cart
	if(empty($_SESSION['cart'][$OptionValue])){
		//add cart
		$_SESSION['cart'][$OptionValue]['deal_info'] = $OptionValue;
		$_SESSION['cart'][$OptionValue]['quantity'] = 1;
	}else{
		//$cart = $_SESSION['cart'][$OptionValue];
		//$cart['quantity'] += 1;
		$_SESSION['cart'][$OptionValue]['quantity']++; 
		$_SESSION['cart'][$OptionValue]['deal_info'] = $OptionValue;
	}
	redirect( WEB_ROOT. '/gio-hang');
}else{
	redirect( WEB_ROOT. '/');
}
