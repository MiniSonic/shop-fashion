<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
need_partner();

$voucherID = abs(intval($_GET['id']));
Table::UpdateCache('voucher', $voucherID, array('iused'=>2));
	Session::Set('notice', "Set used ok ...");
	json(null, 'refresh');
?>