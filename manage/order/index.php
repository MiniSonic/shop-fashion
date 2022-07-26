<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');

$t_con = array(
	'begin_time < '.time(),
	'end_time > '.time(),
);
$methods = DB::LimitQuery('shipping_method');
$teams = DB::LimitQuery('team', array('condition'=>$t_con));
$t_id = Utility::GetColumn($teams, 'id');

$condition = array(
	//'team_id' => $t_id,
	//'team_id > 0',
);
//tracking
$value = abs(intval($_GET['value']));
$idd = abs(intval($_GET['idd']));
$action = abs(intval($_GET['act']));
if($action=='tracking' && $idd){
	Table::UpdateCache('buynow', $idd, array( 'track' => $value,));
	Session::Set('notice', 'Trạng thái đơn hàng đã được thay đổi');
}
/* filter */
$email = strval($_GET['email']);
if ($email) $condition[] = "email like '%".mysql_escape_string($email)."%'";
$mobile = strval($_GET['mobile']);
if ($mobile) {
	 $condition[] = "mobile like '%".mysql_escape_string($mobile)."%'";
}
$order_code = strval($_GET['order_code']);
if($order_code) $condition[] = "order_code like '%".mysql_escape_string($order_code)."%'";

/* end fiter */

$count = Table::Count('buynow', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$orders = DB::LimitQuery('buynow', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$pay_ids = Utility::GetColumn($orders, 'pay_id');
$pays = Table::Fetch('pay', $pay_ids);

$user_ids = Utility::GetColumn($orders, 'user_id');
$users = Table::Fetch('user', $user_ids);

$team_ids = Utility::GetColumn($orders, 'team_id');
$teams = Table::Fetch('team', $team_ids);

$cur_here = 'index';
include template('manage_order_buynow');
