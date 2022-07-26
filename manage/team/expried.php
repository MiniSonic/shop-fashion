<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

$hethan=strtotime('1 days');
$now = strtotime(date('Y-m-d'));
$condition = array(
	'system' => 'Y',
	"end_time > {$now}",
);
/* filter start */
$team_type = strval($_GET['team_type']);
if ($team_type) { $condition['team_type'] = $team_type; }
/* filter end */

$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 1000);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
$cities = Table::Fetch('category', Utility::GetColumn($teams, 'city_id'));

$selector = 'expried';
include template('manage_team_expried');
