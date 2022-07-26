<?php
require_once(dirname(__FILE__) . '/app.php');

$id = abs(intval($_GET['id']));
if (!$id || !$team = Table::FetchForce('team', $id) ) {
	redirect( WEB_ROOT . '/team/index.php');
}
//team view count
if($id && $team){
	$time_die = $team['view_timeout']?$team['view_timeout']:60;
	$view_id = 'view_'.$id;
	if(cookieget($view_id)==''){
		//increase view
		$view_unit = $team['view_unit']?$team['view_unit']:1;
		$views = $team['view'] + $view_unit;
		Table::UpdateCache('team', $id, array('view' => $views));
		//set cookie
		cookieset($view_id, $id, $time_die);
	}
}

/* refer */
if ($_rid = abs(intval($_GET['r']))) { 
	if($_rid) cookieset('_rid', abs(intval($_GET['r'])));
	redirect( WEB_ROOT . "/team.php?id={$id}");
}
$teamcity = Table::Fetch('category', $team['city_id']);
$city = $teamcity ? $teamcity : $city;
$city = $city ? $city : array('id'=>0, 'name'=>'All');

$pagetitle = $team['product'];

$discount_price = $team['market_price'] - $team['team_price'];
$discount_rate = team_discount($team);
$left = array();
$now = time();
if($team['end_time']<$team['begin_time']){$team['end_time']=$team['begin_time'];}
if($team['begin_time']>$now)
	{
		$diff_time = $left_time = $team['begin_time'] - $now;
	}
else
	{
		$diff_time = $left_time = $team['end_time']-$now;
	}
if ( $team['team_type'] == 'seconds' && $team['begin_time'] >= $now ) {
	$diff_time = $left_time = $team['begin_time']-$now;
}


//progress bar size
$pro_percent = 198*($team['now_number']/$team['max_number']);

//$partner = Table::Fetch('partner', $team['partner_id']);
$team['state'] = team_state($team);

//order
if ($login_user_id && 0==$team['close_time']) {
	$order = DB::LimitQuery('order', array(
		'condition' => array(
			'team_id' => $id,
			'user_id' => $login_user_id,
			'state' => 'unpay',
		),
		'one' => true,
	));
}
//other team
$cond_o = array("id <> '$id'", "begin_time <= '$now'", "end_time > '$now'",);
if(get_type_cate($team['group_id'])=='root') 
	$cond_o['group_pid'] = $team['group_id'];
else 
	$cond_o['group_id'] = $team['group_id'];

$team_others = DB::LimitQuery('team',array(
	'condition' => $cond_o,
	'order' => 'ORDER BY sort_order DESC, id DESC',
	'size' => $INI['system']['other_cate_item'],
));
//page type
$page_type = 'detail';
$team2 = Table::Fetch('team', $id);
$seo_title = $team['seo_title'];
$seo_keyword = $team['seo_keyword'];
$seo_description = $team2['seo_description'];

include template('team_view');
