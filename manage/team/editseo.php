<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);

if ( is_get() && empty($team) ) {
	redirect( WEB_ROOT . '/manage/team/edit.php' );
}
else if ( is_post() ) {
	$team = $_POST;
	$insert = array(
			'seo_title', 'seo_description', 'seo_keyword',
			);
	$table = new Table('team', $team);
	if ( $team['id'] && $team['id'] == $id ) {
		$table->SetPk('id', $id);
		$table->update($insert);
		Session::Set('notice', 'Thay đổi nội dung SEO thành công');
		redirect( WEB_ROOT . "/manage/team/editseo.php?id={$id}");
	} 
	else {
		Session::Set('error', 'Thay đổi nội dung SEO thất bại');
		redirect(null);
	}
}

$selector = 'edit';
include template('manage_team_editseo');
