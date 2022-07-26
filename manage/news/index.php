<?php
/**
 * quản lý thông tin ngân hàng.
 */
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();

if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$getnews = Table::Fetch('news', $id);
}

//add CKEditor

$CKEditor = new CKEditor();

$CKEditor->returnOutput = true;

$width	=	"100"."%";

$CKEditor->config['width'] = $width;

CKFinder::SetupCKEditor( $CKEditor,'../../include/plugin/ckfinder/' ) ;

$detail_content = $getnews['detail'];
$detail = $CKEditor->editor("detail", $detail_content);

if(is_post()){
	if($_POST['createnew']){
	$insert	=	array('cate_id','title','news_desc','detail','image','create_time','keyword_s','display','sort_order');
	$table	=	new Table('news',$_POST);
	$table->cate_id	=	abs(intval($_POST['cate_id_info']));
	$table->title	=	$_POST['title_info'];
	$table->news_desc	=	$_POST['news_desc_info'];
	$table->detail	=	$_POST['detail'];
	$table->image = upload_image('upload_image_info',null,'news');
	$table->create_time = strtotime('now');
	$table->keyword_s	=	$_POST['keyword_s_info'];
	$table->display	=	$_POST['display_info'];
	$table->sort_order	=	$_POST['sort_order_info'];
	//add detail
	//$table->SetStrip('detail');
		$newnews	=	$table->insert($insert);
		if(!empty($newnews)) {
			header("location: ".WEB_ROOT."/manage/news/index.php?result=successfull");
		}
	}
	else if ($_POST['edit'] && $_POST['id']){
			$images=upload_image('upload_image_info',null,'news');
			if(!empty($images)){
				$flag=Table::UpdateCache('news', $_POST['id'], array('cate_id'=>abs(intval($_POST['cate_id_info'])),'title'=>$_POST['title_info'],'news_desc'=>$_POST['news_desc_info'],'detail'=>$_POST['detail'],'image'=>$images,'keyword_s'=>$_POST['keyword_s_info'],'display'=>$_POST['display_info'],'sort_order'=>$_POST['sort_order_info']));
				if($flag){
					Session::Set('notice', "Đã sửa thông tin tin tức số {$_POST['id']}");
					redirect( WEB_ROOT. "/manage/news/index.php");
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin tin tức số {$_POST['id']}");
			}
			else{
			 	$flag=Table::UpdateCache('news', $_POST['id'], array('cate_id'=>abs(intval($_POST['cate_id_info'])),'title'=>$_POST['title_info'],'news_desc'=>$_POST['news_desc_info'],'detail'=>$_POST['detail'],'keyword_s'=>$_POST['keyword_s_info'],'display'=>$_POST['display_info'],'sort_order'=>abs(intval($_POST['sort_order_info']))));
				if($flag){
					Session::Set('notice', "Đã sửa thông tin tin tức số {$_POST['id']}");
					redirect( WEB_ROOT. "/manage/news/index.php");
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin tin tức số {$_POST['id']}");
			}
		}
	}
$count = Table::Count('news', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$newss = DB::LimitQuery('news', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$cate_news = DB::LimitQuery('category', array(

			'condition' => array( 'zone' => 'news', ),

			));

$cate_news = Utility::OptionArray($cate_news, 'id', 'name');

include template('manage_news_index');
