<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();
if(is_post()){
	if($_POST['createnew']){
		$insert	=	array('method_id','district_id','cost');
		$table	= 	new Table('shipping_cost',$_POST);
		$table->district_id	=  $_POST['district'];
		$table->method_id    =	$_POST['method_info'];
		$table->cost    =	$_POST['cost_info'];
		$newcost	  =	$table->insert($insert);
		if(!empty($newcost)) {
			Session::Set('notice', "Thêm phí giao hàng thành công!");
			header("location: ".WEB_ROOT."/manage/system/shipping_cost.php");
		}
	}
	else if ($_POST['edit'] && $_POST['id']){
			$flag = Table::UpdateCache('shipping_cost', $_POST['id'], array(
				'method_id' => $_POST['method_info'],
				'district_id' => $_POST['district'],
				'cost' => $_POST['cost_info'],
			));
			if($flag){
				Session::Set('notice', "Sửa thông tin phí giao hàng thành công!");
				redirect( WEB_ROOT. "/manage/system/shipping_cost.php");
			}
			else Session::Set('notice', "Lỗi khi sửa thông tin phí giao hàng");
		}
	}
	
$count = Table::Count('shipping_cost');
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$shipping_costs = DB::LimitQuery('shipping_cost', array(
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$get_shipping_costs = Table::Fetch('shipping_cost', $id);
	$province_id = get_pid_local($get_shipping_costs['district_id']);
	$district_id = $get_shipping_costs['district_id'];
	$districtss = DB::LimitQuery('location', array('condition' => array('local' => 'district','pid'=>$province_id),));
	$districtss = Utility::OptionArray($districtss, 'id', 'name');
}

$methods = DB::LimitQuery('shipping_method', array('order' => 'ORDER BY id DESC',));

include template('manage_shipping_cost');
