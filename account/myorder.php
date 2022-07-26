<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

$condition = array('user_id' => $login_user_id);

$count = Table::Count('order',$condition);

$page_size = $INI['system']['myorderitem']?$INI['system']['myorderitem']:10;

$display_page = $count>$page_size?true:false;

list($pagesize, $offset, $pagestring) = pagestring($count, $page_size);

$orders = DB::LimitQuery('order', array(

	'condition' => $condition,
	
	'order' => 'ORDER BY id DESC',
	
	'size' => $pagesize,

	'offset' => $offset,
));

$methods = DB::LimitQuery('shipping_method', array());

$pagetitle = 'Lịch sử mua hàng';

$page_type = 'myorder';

include template('account_order');
