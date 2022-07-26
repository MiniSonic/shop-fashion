<?php
require_once(dirname(dirname(__FILE__)) . '/include/application.php');
if ( !isset($_REQUEST['term']) )
    exit;
$dblink = mysql_connect('localhost', 'cungre_4353df', 'GlOp7Yk5alA') or die( mysql_error() );
mysql_select_db('cungre_4353df');
mysql_query("SET NAMES utf8");
$rs = mysql_query('select title, product, id from team where product like "%'. mysql_real_escape_string($_REQUEST['term']) .'%" order by id asc limit 0,10', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
		$title = $row['product'];
        $data[] = array(
            'label' => str_replace($_REQUEST['term'],'<span class=hw>2'.$_REQUEST['term'].'</span>',$row['product']),
            'value' => $row['product'],
			'link' =>"http://cungre.vn/hcm/".$row['id']."/".$title,
        );
    }
}

echo json_encode($data);
flush();

