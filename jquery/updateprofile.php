<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

//get post
$fullname = $_POST['tbxFullName'];
$gender = $_POST['rdGender'];
$birthday = strtotime($_POST['tbxDay'].'/'.$_POST['tbxMonth'].'/'.$_POST['tbxYear']);
$province = $_POST['hdProvinceSelected'];
$district = $_POST['hdDistrictSelected'];
$address = $_POST['tbxAddress'];
$mobile = $_POST['tbxMobile'];
//$ismailing = $_POST['IsMailing'];

$update = array(
	'realname' => $fullname,
	'gender' => $gender,
	'birthday' =>$birthday,
	'province_id' => $province,
	'district_id' => $district,
	'address' => $address,
	'mobile' => $mobile,
);
$flag = Table::UpdateCache('user',$login_user['id'], $update);
if($flag) 
	echo '1';
else 
	echo '0';
