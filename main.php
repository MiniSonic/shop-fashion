<?php

//code by mrnhan108@gmail.com

require_once(dirname(__FILE__). '/app.php');

global $count_timer;

$count_timer = 1000;

$pagetitle = 'Deal giá tốt hôm nay';

$page_type = 'home';

include template('main');

