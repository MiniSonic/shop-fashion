<?php
require_once(dirname(__FILE__) . '/app.php');

$tip = strval($_GET['tip']);

if ($_POST) {
	$city_id = abs(intval($_POST['city_id']));
	ZSubscribe::Create($_POST['email'], $city_id);
	cookie_city( $city = Table::Fetch('category', $city_id));
	die(include template('subscribe_success'));
	redirect( WEB_ROOT . '/index.php' );
}

$pagetitle = 'Nhận thông tin deal giá rẻ mỗi ngày.';
include template('subscribe');
