<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
//code by mrnhan108@gmail.com
$districtID = intval($_POST['districtID']);

$methods = DB::LimitQuery('shipping_method',array(

));

include template('block_method_list');
