<?php 
$others_side_ns = abs(intval($INI['system']['sideteam']));
$others_team_id = abs(intval($team['id']));
$others_city_id = abs(intval($city['id']));
$others_now = time();
	$oc = array( 
			'city_id' => array($others_city_id, 0), 
			'team_type' => 'normal',
		//	"id <> '$others_team_id'",
			"begin_time < '$others_now'",
			"end_time > '$others_now'",
			);
	$others = DB::LimitQuery('team', array(
				'condition' => $oc,
				'order' => 'ORDER BY `sort_order` DESC, `id` DESC',
				'size' => 15,
				));
	$count = Table::Count('team', $oc);	
; ?>
<div class="clear"></div>
<div class="sbox side-support-tip">
    <div align="left" style="padding-bottom: 30px; background-color: rgb(250, 250, 250);">
    	<style type="text/css">
        	.aListBPLine{width:220px;display:block;top:0px;z-index:10;left:0px;position:relative;}
			.aListBPLine h3{font-size:12px;color:#fff;padding:3px 10px 0 10px;}
			.dInfoBRNew{width:210px;margin:auto;border:1px solid #bfbfbf;margin:5px 0 0 10px;}
			
			.dSOListBRN .div_TietKiem {height:42px;padding:11px 0 0 3px;text-align:center;width:53px;}
			.PriceDealBRL{position:absolute;bottom:0px;left:-6px;margin-bottom:-17px;height:56px;}
			.PriceDealBRL .divPrice{margin-left:16px;min-width:111px;background-color:#b6c6a3;height:16px;padding:2px 0 0 7px; white-space:nowrap; color:#000000;font-size:12px; font-family:Arial, Helvetica, sans-serif}
			.PriceDealBRL .div_infoMoney{width:118px;height:40px;background:#FB6D17 url(../images/img_conlai.png) no-repeat;margin-top:-3px;position:absolute;bottom:0px;margin-left:16px;}
			.PriceDealBRL .strTextVND{margin-left:36px;}.PriceDealBRL .div_TextInfoMoney{width:118px;}
			.styleText14{
				font-size:11px; font-family:Arial, Helvetica, sans-serif
			}
			.styleText15{
				font-size:17px; font-family:Arial, Helvetica, sans-serif;text-shadow:0 1px 1px rgba(0, 0, 0, 0.7);
			}
			.styleText16{
				font-size:7px; font-family:Arial, Helvetica, sans-serif
			}
			.styleText17{
				font-size:10px; font-family:Arial, Helvetica, sans-serif
			}
			.styleText13{
				font-size:11px; font-family:Arial, Helvetica, sans-serif
			}
			.styleText5{
				font-size:16px; font-family:Arial, Helvetica, sans-serif;text-shadow:0 1px 1px rgba(0, 0, 0, 0.7);
			}
			.pLineDotted{width:225px;margin-left:2px;margin-bottom:3px; margin-top:3px; opacity:0.5;filter:alpha(opacity=50);}
			.side_deal_info {
    color: #FFFFFF;
    height: 30px;
    padding-bottom: 10px;
	padding-left:10px;
}

	.side-deal-value {
    background: none repeat scroll 0 0 #6F6F6F;
    float: left;
    text-align: center;
    width: 105px;
}
	.side_deal_info h3 {
    font-size: 11px;
    font-weight: normal;
    width: 100%;
}
	.side_deal_info span {
    font-size: 17px;
    font-weight: bold;
    width: 105px;
}
	.side-deal-price {
    background: none repeat scroll 0 0 #FF3300;
    float: left;
    text-align: center;
    width: 105px;
}
        </style>
	<?php $index=0; ?>
		<?php if(is_array($team_others)){foreach($team_others AS $one) { ?>
		<?php  $href=rewrite_team_id($one['id']);; ?>
		<div onclick="window.location='<?php echo $href; ?>'" style="padding-bottom: 5px; cursor: pointer;">
        	<div class="aListBPLine" style="color: rgb(255, 255, 255); cursor: pointer;">
              <h3><a style="color: rgb(0, 0, 0); font-size: 13px;" href="<?php echo $href; ?>"><?php echo $one['product']; ?></a></h3>
              <div class="dInfoBRNew"><a style="color: rgb(0, 0, 0); font-size: 13px;" href="<?php echo $href; ?>"><img height="120" width="210" border="0" alt="<?php echo $one['product']; ?>" src="<?php echo team_image($one['image']); ?>"></a></div>
          	  <div class="side_deal_info">
					<div class="side-deal-value"><h3>Giá gốc</h3><span> <del><?php echo number_format($one['market_price'],0,'.','.'); ?></del>  đ</span></div>
					<div class="side-deal-price"><h3>Chỉ còn</h3><span> <?php echo number_format(moneyit($one['team_price']),0,'.','.'); ?>  đ</span></div> 
				</div>
            </div>
		</div>
	<?php  if ($index < ($count-1)){
			echo '<div class="pLineDotted"><hr size="1" width="99%"></div>';
		}
		; ?>
		<?php $index++; ?>
		<?php }}?>	
		</div>
</div>
