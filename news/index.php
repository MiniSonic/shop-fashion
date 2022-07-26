<?php

//code by hoangthikd@gmail.com

require_once(dirname(dirname(__FILE__)) . '/app.php');

$daytime = strtotime(date('Y-m-d H:s:i'));

$condition = array('display' => 'Y',);

$cate_id = abs(intval($_GET['cid']));

if ($cate_id) $condition['cate_id'] = $cate_id;

$count = Table::Count('news', $condition);

$INI['system']['newsitem']?$INI['system']['newsitem']:10;

list($pagesize, $offset, $pagestring) = pagestring($count, $INI['system']['newsitem']);

$newss = DB::LimitQuery('news', array(

	'condition' => $condition,

	'order' => 'ORDER BY sort_order DESC, id DESC, create_time DESC',

	'size' => $pagesize,

	'offset' => $offset,

));

foreach($newss AS $id=>$one){
	
	$news[$id] = $one;
	
}

$category = Table::Fetch('category', $group_id);

$pagetitle = get_name_cates($cate_id);

$page_type = 'news';

include template('news_index');


?>