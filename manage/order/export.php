<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');
//fetch deal current
$daytime = strtotime(date('Y-m-d H:s:i'));//gets current day

//Filter date
if ( $_POST ) {
	$begin_time = strtotime($_POST['begintime']);
	$end_time = strtotime($_POST['endtime']);
	$pay_state = $_POST['pay_state'];
	$order_state = $_POST['order_state'];
	//$city_id = intval($_POST['city_id']);
	if (!$begin_time || !$end_time){
		//die('-ERR ERR_CHECK');
		Session::Set('error', 'Thông tin bạn nhập chưa đầy đủ xin điền lại!');
		redirect( WEB_ROOT . '/manage/order/export.php' );
	}

	
	//Condition gets current deal 
	$condition = array(
	//	'order_state' => $order_state,
	//	'state' => $pay_state,
		"create_time >= '{$begin_time}'",
		"create_time <= '{$end_time}'",
	);
	$orders = DB::LimitQuery('buynow', array(
		'condition' => $condition,
		'order' => 'ORDER BY id DESC, create_time ASC',
	));
	
	if (!$orders){
		//die('-ERR ERR_NO_DATA');
		Session::Set('error', 'Không có dữ liệu để xuất, xin điền lại chính xác!');
		redirect( WEB_ROOT . '/manage/order/export.php' );
	}

	$name = 'order_'.date('d.m.Y',$begin_time).'_'.date('d.m.Y',$end_time);
	$kn = array(
	//	'order_code' => 'Số đơn hàng',
		'team_id' => 'Tên deal',
		'price' => 'Giá bán',
		'quantity' => 'Số lượng',
		'total' => 'Thành tiền',
		'create_time' => 'Đặt hàng lúc',
		'order_state' => 'Trạng thái',
		'realname' => 'Họ tên',
		'address' => 'Địa chỉ',
		'district_id' => 'Quận',
		'province_id' => 'Tỉnh / Thành',
	//	'ward_id' => 'Phường / Xã',
		'mobile' => 'Điện thoại',
		'source' => 'Nguồn',
	//	'be_pay' => 'Đã thanh toán',
	//	'fare' => 'Phí vận chuyển',
		'remark'=>'Ghi chú',
	//	'state' => 'Thanh toán',
	//	'method' => 'Phương thức'
		);

	$eorders = array();
		foreach($orders as $one){
			$team = Table::Fetch('team', $one['team_id']);
			$one1['order_code'] = $one['order_code'];
			$one1['team_id'] = $team['product'];
			$one1['realname'] = $one['name'];
			$one1['mobile'] = $one['mobile'];
			$one1['province_id'] = getRecord('vncountry',$one['tp'],'name');
			$one1['district_id'] = getRecord('vncountry',$one['quan'],'name');
			$one1['ward_id'] = getRecord('vncountry',$one['ward_id'],'name');
			$one1['address'] = $one['address'];
			$one1['price'] = $team['team_price'];
			$one1['total'] = $team['team_price']*$one['number'];
			$one1['quantity'] =$one['number'];
			$one1['be_pay'] = $one['credit']+$one['card'];
			$one1['fare'] = $one['fare'];
			$one1['create_time'] = date('Y-m-d H:i',$one['create_time']);
			$one1['remark'] = $one['note'];
			$one1['state'] = $option_pay[$one['state']];
			$one1['order_state'] = $option_order_state[$one['order_state']];
			$one1['method'] = get_name_method($one['method_id']);
			$eorders[] = $one1;
		}
	down_xls($eorders, $kn, $name);
}

include template('manage_order_export');
