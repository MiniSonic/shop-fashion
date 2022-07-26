<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if ($_POST) {
	if (!$_POST['content'] || !$_POST['title'] || !$_POST['contact']) {
		Session::Set('error', 'Xin nhập đầy đủ thông tin');
		redirect( WEB_ROOT . '/feedback/seller.php');
	}
	$table = new Table('feedback', $_POST);
	$table->city_id = abs(intval($city['id']));
	$table->user_id = $login_user['id'];
	$table->create_time = time();
	$table->category = 'seller';
	$table->title = htmlspecialchars($table->title);
	$table->content = htmlspecialchars($table->content);
	$table->contact = htmlspecialchars($table->contact);
	$table->Insert(array(
		'city_id', 'user_id', 'title', 'contact', 'content', 'create_time',
		'category',
	));

	redirect( WEB_ROOT . '/feedback/success.php');
}

$pagetitle = 'Nhà cung cấp - hợp tác kinh doanh';
include template("feedback_seller");
