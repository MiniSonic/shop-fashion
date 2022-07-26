<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Template email</title>

</head>



<body>

<?php

require_once('../app.php');

$groups = DB::LimitQuery('cate', array(

		//	'condition' => array( 'zone' => 'group', ),

			));

$now = time();

$num = date("w");

if ($num == 0)

{ $sub = 6; }

else { $sub = ($num-1); }

$WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));    //monday week begin calculation

$todayh = getdate($WeekMon); //monday week begin reconvert



$d = $todayh[mday];

$m = $todayh[mon];

$y = $todayh[year];

$_root=$INI['system']['wwwprefix'];



$daytime = strtotime(date('Y-m-d H:i:s'));

if(!$_REQUEST['id']) {

$condition = array(

	'team_type' => 'normal',

	'city_id' => array(0, abs(intval($city['id']))),

	"end_time   >= '{$daytime}'",

	"begin_time <= '{$daytime}'",

);

}

$count = Table::Count('team', $condition);

list($pagesize, $offset, $pagestring) = pagestring($count, 100);

$teams = DB::LimitQuery('team', array(

	'condition' => $condition,

	'order' => ' ORDER BY begin_time DESC, sort_order DESC, id DESC',

	'size' => $pagesize,

	'offset' => $offset,

));


function cutString($str){
	return $str;
	}


?>

<div><form method="get" name="frm" action="">Xuất template gửi mail khách hàng:

<select name="id">

<option value="">---------Vui DEAL HOT ---------</option>

<?php

foreach($teams AS $id=>$team){

?>

<option value="<?=$team['id']?>" <?=$_REQUEST['id']==$team['id']?'selected="selected"':''?>><?=$team['id']?>.<?=$team['product']?></option>

<?php }?>

</select>

&nbsp;&nbsp;&nbsp;&nbsp; 

<select name="cate">

<option value="">---------DEAL cùng thể loại ---------</option>

<?php

foreach($groups AS $id=>$team){

?>

<option value="<?=$team['id']?>" <?=$_REQUEST['cate']==$team['id']?'selected="selected"':''?>><?=$team['name']?></option>

<?php }?>

</select>



&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" value="OK" />

</form>

</div>



<hr />

<div style="text-align:center;background:#FFF;margin:0px"><center> 

<div style="width:100%;background:#FFC;font-family:Arial,Helvetica,sans-serif">  <table width="500" cellspacing="0" cellpadding="0">   <tbody>

<tr style="background:#FFF">    <td width="219" align="left" style="text-align:left;padding:8px"><a target="_blank" title="cungre.vn" href="http://cungre.vn" style="text-decoration:none"><img width="189"  border="0" title="www.cungre.vn" style="display:block;padding:7px" alt="www.cungre.vn" src="http://cungre.vn/include/template/HD/css/images/logo.png"></a><a target="_blank" title="cungre.vn" href="http://cungre.vn" style="text-decoration:none"></a></td>    

<td width="421" align="left"><font size="  4pt" color="#FF0000">    <p style="border-left:solid #545454 1.0pt;min-height:50px;padding-left:10px">Cùng rẻ mỗi ngày<br>     <strong>

<font size="5" color="#FF0000">CAM KẾT CHẤT LƯỢNG</font></strong></p>    </font></td>    <td width="21" align="left" style="font-size:13px;color:#fff;text-align:right;padding-right:10px;color:#FFF;vertical-align:middle">&nbsp;</td>   </tr> 

  <tr>    <td align="center" style="border-top:5px solid #390;background:#fff" colspan="3">&nbsp;</td>   </tr>  

  

   <tr>    <td align="center" style="background:#fff" colspan="3">    <table width="100%" cellspacing="0" cellpadding="0" border="0">     <tbody>



<?php



$daytime = strtotime(date('Y-m-d H:i:s'));

if($_REQUEST['id']) {

$team = Table::Fetch('team',$_REQUEST['id']);



$_href=$INI['system']['wwwprefix']."/".rewrite_team_id($team['id']);

?>

   


			 

<?php }?>			 

			        <tr>     </tr>  

					<tr>                   

<?php

if($_REQUEST['id']) {

$condition2 = array(

	'team_type' => 'normal',

	"end_time   >= '{$daytime}'",

	"begin_time <= '{$daytime}'",

);

if($_REQUEST['cate']) $condition2['group_id']=$_REQUEST['cate'];

$count = Table::Count('team', $condition);

$daytime = strtotime(date('Y-m-d H:i:s'));

list($pagesize, $offset, $pagestring) = pagestring($count, 16);

$teams = DB::LimitQuery('team', array(

	'condition' => $condition2,

	'order' => ' ORDER by RAND()',

	'size' => 8,


));

foreach($teams AS $id=>$team){

if ($id%2==0) {

$alg="left";



} else {

$alg="right";



}

$_href=$INI['system']['wwwprefix'].rewrite_team_id($team['id']);

?>

               <?=$bro?>

			   <td align="<?=$alg?>" style="padding-<?=$alg?>:15px;"><table width="235" cellspacing="0" cellpadding="0" border="0" style="background:#F5F5F5;margin-bottom:15px">       <tbody><tr>        <td align="center" style="padding:10px 20px 10px 23px; overflow:hidden; height:30px" scope="col"><a target="_blank" title="<?=$team['title']?>" href="<?=$_href?>" style="text-decoration:none"><span style="color:#FF6600;text-decoration:none;font-size:14px"><strong><?=cutString($team['product'],40)?></strong></span></a></td>       

    </tr>       <tr>        <td align="center" style="padding:0px 10px"><a target="_blank" title="<?=$team['title']?>" href="<?=$_href?>" style="text-decoration:none"><img src="<?=$INI['system']['wwwprefix']?>/static/<?=$team['image']?>" alt="<?=$team['title']?>" width="250" height="160" border="0" style="padding:3px;display:block;background:#fff" title="<?=$team['title']?>"></a></td>       

    </tr>       <tr>        <td align="center"><table width="257" cellspacing="0" cellpadding="0" border="0">         <tbody><tr style="background:#90C634;font-size:10px">          <td width="50%" align="center" scope="col" style="padding:3px">Giảm giá</td>          <td width="50%" align="center" scope="col" style="padding:3px;border-left:1px #666 solid">Giá bán</td>         </tr>         <tr style="background:#90C634;font-size:16px;font-weight:bolder">          <td align="center" scope="col" style="padding:3px;color:#FFFFFF"><?=round(moneyit((100*($team['market_price'] - $team['team_price'])/$team['market_price'])))?>%</td>          <td align="center" scope="col" style="padding:3px;border-left:1px #666 solid;color:#FFFFFF"><?=number_format(moneyit($team['team_price']),0,'.','.')?>đ</td>         </tr>        </tbody></table></td>       </tr>             </tbody></table>      </td>     

	

	              

		

<?php if (($id+1)%2==0) echo '</tr>'; }}?>		



<tr>      <td height="15" align="center" style="background:#fff" colspan="3">&nbsp;</td>     </tr>   



  <tr>      <td valign="middle" align="center" style="font-size:15px;background:#F60;padding:15px 0px 5px 0px" colspan="3"><strong>Giao hàng - thu tiền tận nơi. Gọi ngay: <span style="color:#FFF">0121.85.95.777</span></strong><br/></td>     </tr> 

  

           <tr>      <td align="center" style="font-size:10px;line-height:18px;background:#666;color:#fff" colspan="3"><p style="border-top:1px solid #fff;padding:6px 0px 5px 0px;margin:0px;width:600px;text-align:center;line-height:15PX">Vui lòng thêm info@cungre.vn vào danh bạ email của bạn. Để nhận các thông tin khuyến mãi giá rẻ mỗi ngày<a target="_blank" href="http://cungre.vn" style="color:#FFF"></a> <br>

	  <div style="font-weight:bold; font-size:18px">Công ty TNHH CÙNG RẺ</div>

	         <strong>Tầng 7-8 AB Tower
76 Lê Lai, Quận 1, TP. Hồ Chí Minh
             <br/>
             Điện thoại: 08.667.10818 - Email: info@cungre.vn - Website: cungre.vn
             </strong>       </p></td>     </tr>    </tbody></table>    </td>   </tr>  </tbody></table> </div></center>

</div>

</body>

</html>

