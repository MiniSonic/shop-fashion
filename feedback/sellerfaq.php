<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
$page = Table::Fetch('page', 'feedback_sellerfaq');
$pagetitle = 'Nhà cung cấp - hợp tác kinh doanh';
include template("feedback_sellerfaq");
?>