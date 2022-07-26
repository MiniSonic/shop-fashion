<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$carts = $_SESSION['cart'];
//check login
if(empty($login_user_id)||empty($carts)) redirect(WEB_ROOT . '/gio-hang');

if($login_user_id){
	$users = Table::Fetch('user', $login_user_id);
	$methods = DB::LimitQuery('shipping_method',array(
	//	'condition' => array('display_info'=>'Y'),
	));
}

$page_type = 'checkout';

include template('team_checkout');
