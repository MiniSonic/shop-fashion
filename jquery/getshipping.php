<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$districtID = intval($_POST['districtID']);
$paymentMenthodID = intval($_POST['paymentMenthodID']);

$costs = DB::LimitQuery('shipping_cost', array(
	'condition' => array('district_id' => $districtID, 'method_id' => $paymentMenthodID)
));

if(!empty($costs)) echo $costs['0']['cost'];
else echo '0';
