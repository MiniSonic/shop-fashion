<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

//get data *code by mrnhan108@gmail.com
if(isset($_SESSION['cart'])) $carts = $_SESSION['cart'];

else $carts = array();

$pagetitle = 'Giỏ hàng';

$page_type = 'cart';

include template('team_cart');
