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
		redirect( WEB_ROOT . '/manage/order/down.php' );
	}

	
	//Condition gets current deal 
	$condition = array(
		'order_state' => $order_state,
		'state' => $pay_state,
		"create_time >= '{$begin_time}'",
		"create_time <= '{$end_time}'",
	);
	$orders = DB::LimitQuery('order', array(
		'condition' => $condition,
		'order' => 'ORDER BY id DESC, create_time ASC',
	));
	
	if (!$orders){
		//die('-ERR ERR_NO_DATA');
		Session::Set('error', 'Không có dữ liệu để xuất, xin điền lại chính xác!');
		redirect( WEB_ROOT . '/manage/order/down.php' );
	}

	$name = 'order_'.date('d.m.Y',$begin_time).'_'.date('d.m.Y',$end_time);
	$kn = array(
		'order_code' => 'Số đơn hàng',
		'team_id' => 'Tên deal',
		'realname' => 'Họ tên',
		'mobile' => 'Số điện thoại',
		'address' => 'Địa chỉ',
		'province_id' => 'Tỉnh / Thành',
		'district_id' => 'Quận / Huyện',
		'ward_id' => 'Phường / Xã',
		'quantity' => 'Số lượng',
		'price' => 'Giá',
		'total' => 'Thành tiền',
		'be_pay' => 'Đã thanh toán',
	//	'fare' => 'Phí vận chuyển',
		'create_time' => 'Ngày mua',
		'remark'=>'Ghi chú',
	//	'state' => 'Thanh toán',
	//	'order_state' => 'Tình trạng',
	//	'method' => 'Phương thức'
		);

	$eorders = array();
	foreach( $orders AS $one ) {
		$team_ids = DB::LimitQuery('team_order', array(
			'condition' => array('order_id' => $one['id']),
			'order' => 'ORDER BY team_id DESC',
		));
		foreach($team_ids as $one1){
			$team = Table::Fetch('team', $one1['team_id']);
			$one1['order_code'] = $one['order_code'];
			$one1['team_id'] = $team['product'];
			$one1['realname'] = $one['fullname'];
			$one1['mobile'] = $one['mobile'];
			$one1['province_id'] = getRecord('vncountry',$one['province_id'],'name');
			$one1['district_id'] = getRecord('vncountry',$one['district_id'],'name');
			$one1['ward_id'] = getRecord('vncountry',$one['ward_id'],'name');
			$one1['address'] = $one['address'];
			$one1['price'] = $team['team_price'];
			$one1['total'] = $team['team_price']*$one1['quantity'];
			$one1['be_pay'] = $one['credit']+$one['card'];
			$one1['fare'] = $one['fare'];
			$one1['create_time'] = date('Y-m-d H:i',$one['create_time']);
			$one1['remart'] = $one['remark'];
			$one1['state'] = $option_pay[$one['state']];
			$one1['order_state'] = $option_order_state[$one['order_state']];
			$one1['method'] = get_name_method($one['method_id']);
			$eorders[] = $one1;
		}
	}
	down_xls($eorders, $kn, $name);
}

include template('manage_order_down');
