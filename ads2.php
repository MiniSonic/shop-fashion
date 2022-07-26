<?php

//code by hoangthikd@gmail.com

require_once(dirname(__FILE__). '/app.php');

$daytime = strtotime(date('Y-m-d H:s:i'));

$condition = array(

	'team_type' => 'normal',

	'city_id' => array(0, abs(intval($city['id']))),

	"begin_time <= '{$daytime}'",

	"end_time > '{$daytime}'",

);


if (!option_yes('displayfailure')) {

	$condition['OR'] = array(

		"now_number >= min_number",

		"end_time > '{$daytime}'",

	);

}

$group_id = abs(intval($_GET['gid']));

if ($group_id) $condition['group_id'] = $group_id;



$count = Table::Count('team', $condition);

$teams = DB::LimitQuery('team', array(

	'condition' => $condition,

	'order' => 'ORDER BY sort_order DESC, begin_time DESC,  id DESC',

	'size' => $pagesize,

	'offset' => $offset,

));



//Get city

$teamcity = Table::Fetch('category', $team['city_id']);

$city = $teamcity ? $teamcity : $city;

$city = $city ? $city : array('id'=>0, 'name'=>'All');

//End Get city



foreach($teams AS $id=>$one){

	team_state($one);

	if (!$one['close_time']) $one['picclass'] = 'isopen2';

	else $one['picclass'] = 'expired';

	if ($one['state']=='soldout') $one['picclass'] = 'soldout';

	$teams[$id] = $one;

}





$category = Table::Fetch('category', $group_id);

$pagetitle = 'Deal hôm nay';

include template('ads2');

?>