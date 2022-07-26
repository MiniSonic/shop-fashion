<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if ($_POST) {
	if (!$_POST['content'] || !$_POST['title'] || !$_POST['contact']) {
		Session::Set('error', 'Xin nhập đầy đủ thông tin');
		redirect( WEB_ROOT . '/feedback/phanhoi.php');
	}
	$table = new Table('phanhoi', $_POST);
	$table->ngaytao = time();
	$table->hoten = htmlspecialchars($table->tbxGopyFullName);
	$table->email = htmlspecialchars($table->tbxGopyEmail);
	$table->dienthoai = htmlspecialchars($table->tbxGopyPhone);
	$table->noidung = htmlspecialchars($table->tbxGopyContent);
	$table->Insert(array('hoten','email','dienthoai','noidung','ngaytao'));
	redirect( WEB_ROOT . '/feedback/success.php');
}

$pagetitle = 'Phản hồi';
include template("feedback_seller");
