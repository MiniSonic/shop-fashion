<?php

//code by hoangthikd@gmail.com

require_once(dirname(dirname(__FILE__)) . '/app.php');

$id = abs(intval($_GET['id']));

if (!$id || !$news = Table::FetchForce('news', $id) ) {

	redirect( WEB_ROOT . '/news/index.php');

}

/* refer */

if ($_rid = abs(intval($_GET['r']))) { 

	if($_rid) cookieset('_rid', abs(intval($_GET['r'])));

	redirect( WEB_ROOT . "/news/index.php?id={$id}");

}

//SEO
$pagetitle = $news['title'].' | Tin tức '.$INI['system']['abbreviation'];

$seo_title = $news['title'];

$seo_keyword = $news['keyword_s'];

$seo_description = $news['title'];

$page_type = 'news';

//news other

$noc = array( 'display' => 'Y', "id <> '$id'",);

$news_others = DB::LimitQuery('news', array(
	'condition' => $noc,
	'order' => 'ORDER BY `sort_order` DESC, `id` DESC',
	'size' => 10,
));

include template('news_detail');

