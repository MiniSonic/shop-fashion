<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$id = $_GET['id'];
$count = 0;
$order = Table::Fetch('order',$id);
$team_orders = DB::LimitQuery('team_order', array(
	'condition' => array('order_id'=>$id),
	'order' => 'ORDER BY id DESC',
));

$page_type = 'order_success';

include template('team_order_success');
