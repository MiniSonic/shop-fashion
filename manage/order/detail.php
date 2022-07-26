<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');

$t_con = array(
	'begin_time < '.time(),
	'end_time > '.time(),
);
$teams = DB::LimitQuery('team', array(
	'condition' => $t_con,
	'order' => 'ORDER BY id DESC',
));
$option_team = Utility::OptionArray($teams, 'id', 'product');

$condition = array(
	//'team_id' => $t_id,
	//'team_id > 0',
);
//Start filter
$team_id = abs(intval($_GET['team_id']));
if ($team_id) $condition['team_id'] = $team_id;

$email = strval($_GET['email']);
if ($email) {
	$fuser = Table::Fetch('user', $email, 'email');
	$forder = Table::Fetch('order', $fuser['id'],'user_id');
	if($forder) $condition['order_id'] = $forder['id'];
	else $email = null;
}
$mobile = strval($_GET['mobile']);
if ($mobile) {
	$fuser = Table::Fetch('user', $mobile, 'mobile');
	$forder = Table::Fetch('order', $fuser['id'],'user_id');
	if($forder) $condition['order_id'] = $forder['id'];
	else $mobile = null;
}
$order_code = strval($_GET['order_code']);
if($order_code){
	$forder = Table::Fetch('order',$order_code,'order_code');
	if($forder) $condition['order_id'] = $forder['id'];
}

//End fiter

$count = Table::Count('team_order', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$team_orders = DB::LimitQuery('team_order', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_order_detail');