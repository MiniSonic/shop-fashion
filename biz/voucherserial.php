<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
need_partner();
$partner_id = abs(intval($_SESSION['partner_id']));
$action = $_GET['action'];
$login_partner = Table::Fetch('partner', $partner_id);
//-------------------------------------------------------------------
$condition = array(
	'partner_id' => $partner_id,
);
$count = Table::Count('team', $condition);
//list($pagesize, $offset, $pagestring) = pagestring($count, 11);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
/*	'size' => $pagesize,
	'offset' => $offset,*/
));
//============ get for select box ====================================
$teams_select = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
));

//====================================================================
//-------------------------------------------------------------------
$teams_id = Utility::GetColumn($teams, 'id'); // lấy id của team.
$condi = array('team_id'=>$teams_id);
$status = abs(intval($_GET['status']));
$get_team_id = abs(intval($_GET['team_id']));
$get_serial_number = $_GET['serial'];
$fromday = strval($_GET['pbday']);
$today	 = strval($_GET['peday']);

if($status==4) { $condi['istatus'] = 2; } // canced
if($status==3) { $condi['iused'] = 1; $condi['istatus']=1;} // not used
if($status==2) { $condi['iused'] = 2; $condi['istatus']!=2;} // used

if($get_team_id && $get_team_id!=0) { $condi['team_id']=$get_team_id; }
if($get_serial_number) { $condi['serial'] = $get_serial_number; }

if ($fromday) { 
	$fromDays = strtotime($fromday);
	$condi[] = "create_date >= '{$fromDays}'";
}
if ($today) { 
	$toDays = strtotime($today);
	$condi[] = "create_date <= '{$toDays}'";
}

$count_ = Table::Count('voucher', $condi);
list($pagesize, $offset, $pagestring) = pagestring($count_, 50);

$voucher = DB::LimitQuery('voucher', array(
	'condition' => $condi,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

//===============================================
$user_ids	=	Utility::GetColumn($voucher, 'user_id');
$user = Table::Fetch('user', $user_ids);
foreach ($user as  $user_array=>$one){
	$user[$user_array]=$one;
}
//===============================================
//===============================================
$teamsID	=	Utility::GetColumn($voucher, 'team_id');
$teams = Table::Fetch('team', $teamsID);
foreach ($teams as  $teams_array=>$one){
	$teams[$teams_array]=$one;
}
//===============================================
//---------------- download fie -----------------
if($action=='download'){
	$xlsCols = array(
		'team_id'=>'Sản phẩm',
		'user_id'=>'Khách hàng/Mobile',
		'serial'=>'Số serial',
		'create_date'=>'Ngày',
		'istatus'=>'Tình trạng'
	);
	$evoucher = array();
	foreach ($voucher as $one){
		$oneVoucher = $teams[$one['team_id']];
		$one['team_id']=$oneVoucher['title'];
		$one['user_id']=$user[$one['user_id']]['realname'] ."/". $user[$one['user_id']]['mobile'];
		$one['create_date'] = date('d-m-Y',$one['create_date']);
		if($one[istatus]==2) { $one['istatus']="Đã hủy"; }
		if($one[istatus]==1 & $one['iused']==1) { $one['istatus']="Chưa sử dụng"; }
		if($one['iused']==2) { $one['istatus']="Đã sử dụng"; }
		$evoucher[] = $one;
	}
	
	down_xls($evoucher, $xlsCols, '13');
}
//-------------------end download----------------

include template('biz_voucherserial');
?>