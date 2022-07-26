<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if ( $_POST ) {
	$login_partner = ZPartner::GetLogin($_POST['username'], $_POST['password']);
	if ( !$login_partner ) {
		Session::Set('error', 'Tài khoản hoặc mật khẩu không hợp lệ!');
		redirect( WEB_ROOT . '/partner/danh-cho-doi-tac.html');
	} else {
		Session::Set('partner_id', $login_partner['id']);
		redirect( WEB_ROOT . '/biz/index.php');
	}
}
include template('biz_login');
