<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
$teamid = $_POST['teamid'];
$fullname = $_POST['tbxGopyFullName'];
$email = $_POST['tbxGopyEmail'];
$mobile = $_POST['tbxGopyPhone'];
$addres = $_POST['tbxGopYContent'];
$note = $_POST['tbxNote'];
$number = $_POST['soluong'];
$tinh = $_POST['Province'];
$quan = $_POST['DistrictID_s'];
if ($_POST) {
	$table = new Table('buynow', $_POST);
	$table->team_id = abs(intval($teamid));
	$table->tp = abs(intval($tinh));
	$table->quan = abs(intval($quan));
	$table->create_time = time();
	$table->name = htmlspecialchars($fullname);
	$table->address = htmlspecialchars($addres);
	$table->mobile = htmlspecialchars($mobile);
	$table->email = htmlspecialchars($email);
	$table->note = htmlspecialchars($note);
	$table->number = htmlspecialchars($number);
	$table->Insert(array(
		'team_id', 'name', 'email', 'address','mobile', 'create_time','note','number','tp','quan',
	));
	//increase quantity team
		$team = Table::Fetch('team',$teamid);
		$now_number = $team['now_number'] + $number;
		Table::UpdateCache('team', $team['id'], array('now_number'=>$now_number,));
	$rs =1;
}
echo $rs;

