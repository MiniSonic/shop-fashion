<?php

//code by hoangthikd@gmail.com

require_once(dirname(__FILE__). '/app.php');

$p = strval($_GET['p']);

if(empty($p)) redirect( WEB_ROOT . '/index.php');

$option_page = array(
	'help_tour' => 'Cách thức mua hàng',
	//'help_payment' => 'Hướng dẫn thanh toán',
	//'help_faqs' => 'Hỏi đáp',
	'feedback_sellerfaq' => 'Hợp tác với '.$tenngan,
	//'help_api' => 'API',
	'about_contact' => 'Liên hệ',
	'about_us' => 'Về chúng tôi',
	'about_job' => 'Cơ hội nghề nghiệp',
	//'about_terms' => 'Điều khoản sử dụng',
	//'about_privacy' => 'Chính sách riêng tư',
	//'about_credit' => 'Tiền tích lũy là gì?',
	//'reg_shop' => 'Đăng ký mở shop',
	'quychesangiaodich' => 'Quy chế sản giao dịch',
	'delivery_item' => 'Giao nhận hàng',
	'money' => 'Trả hàng và hoàn tiền',
	'bonus' => 'Cách nhận tiền thưởng',
	'account' => 'Tài khoản và đơn hàng',
	'voucher' => 'Sử dụng phiếu '.$tenngan,
);
	
$page = Table::Fetch('page', $p);

$pagetitle = $option_page[$p];

$page_type = 'article';

include template('static_page');