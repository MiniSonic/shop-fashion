<?php

//code by hoangthikd@gmail.com

require_once(dirname(__FILE__). '/include/application.php');

//require_once(dirname(__FILE__). '/include/language/admin/vietnamese.php');

//require_once(dirname(__FILE__). '/include/language/home/vietnamese.php');

// magic_quota_gpc
$_GET = magic_gpc($_GET);
$_POST = magic_gpc($_POST);
$_COOKIE = magic_gpc($_COOKIE);

//process currefer
$currefer = uencode(strval($_SERVER['REQUEST_URI']));

//session, cache, configure, webroot register
Session::Init();
$INI = ZSystem::GetINI();

//biz logic
$currency = $INI['system']['currency'];
$login_user_id = ZLogin::GetLoginId();
$login_user = Table::Fetch('user', $login_user_id);

//$hotcities = option_hotcategory('city', false, true);
$hotcities = option_category('city', false, true);
$allcities = option_category('city', false, true);
$city = cookie_city(null);

//not allow access app.php
if($_SERVER['SCRIPT_FILENAME']==__FILE__){
	redirect( WEB_ROOT . '/index.php');
}

$AJAX = ('XMLHttpRequest' == @$_SERVER['HTTP_X_REQUESTED_WITH']);
if (false==$AJAX) { 
	header('Content-Type: text/html; charset=UTF-8'); 
	run_cron();
} else {
	header("Cache-Control: no-store, no-cache, must-revalidate");
}

