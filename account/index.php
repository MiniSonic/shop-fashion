<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

//load local
$provinces = DB::LimitQuery('location', array('condition' => array('local' => 'province'),));
$provinces = Utility::OptionArray($provinces, 'id', 'name');

$districts = DB::LimitQuery('location', array('condition' => array('local' => 'district','pid'=>$login_user['province_id']),));
$districts = Utility::OptionArray($districts, 'id', 'name');

$page_type = 'profile';
$pagetitle = 'Thông tin cá nhân';
include template('account_index');
