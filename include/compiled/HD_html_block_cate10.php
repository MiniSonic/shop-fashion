<?php if($INI['option']['cate_name9']){?>
<?php 
	$daytime = time();
	$cate_id = abs(intval($INI['option']['cate_name10']));
    $quantity_cate = abs(intval($INI['option']['cate_quantity10']));
    if(empty($quantity_cate)) $cate_quantity = 6;
    $cates = Table::Fetch('cate', $cate_id);
    $cate_name = get_name_cate($cate_id);
	$condition_cate = array(
        'group_pid' => $cate_id,
		"begin_time <= '$daytime'",
		"end_time > '$daytime'",
	
	);
	$team_cate = DB::LimitQuery('team', array(
		'condition' => $condition_cate,
		'order' => 'ORDER BY sort_order DESC, begin_time DESC,  id DESC',
		'size' => $quantity_cate,
	
	));
; ?>

<!--Cate deal-->    
<div class="showproduct_cate">
    <div class="product_top">
        <div class="product_top_title"><a href="<?php echo rewrite_cate_shop($cate_id); ?>" title="<?php echo $cate_name; ?>"><?php echo $cate_name; ?></a></div>
        <div class="product_top_control"><a href="<?php echo rewrite_cate_shop($cate_id); ?>">Xem tất cả</a></div>
    </div>
    <div class="product_cate_content">
        <!--<div class="cate_banner">
            <a href="<?php echo rewrite_cate_shop($cate_id); ?>" target="_blank">
                <img alt="<?php echo $cate_name; ?>, <?php echo $INI['system']['keywordseo']; ?>" src="/static/<?php echo $cates['image_cate']; ?>" />
            </a>
        </div>-->
        <div class="ls_cate_product" style="width:auto">
        	<?php if(is_array($team_cate)){foreach($team_cate AS $one) { ?>
            <div class="cate_product_item_4">
				<div class="cate_product_item_title_4">
                    <a href="<?php echo rewrite_team_id($one['id']); ?>"><?php echo $one['product']; ?></a>
                </div>
				<div class="clear"></div>
                <div class="cate_product_item_img_4">
                	<?php if($team_type!='normal'){?>
                    <span class="ribbon_<?php echo $one['team_type']; ?>"></span>
                    <?php }?>
                    <a href="<?php echo rewrite_team_id($one['id']); ?>">
                        <img alt="<?php echo $one['product']; ?>, <?php echo $INI['system']['keywordseo']; ?>" src="<?php echo team_image($one['image']); ?>" />
                    </a>
                    <div class="cate_product_delivery">
                    
                    	<span class="cate_product_giaohang">
                        	<span class="giao_<?php echo $one['delivery_type']; ?>"></span>
                            <?php echo $option_giaohang[$one['delivery_type']]; ?>
                        </span>
                    </div>
                </div>
                <div class="cate_product_item_desc">
				<?php echo $one['title']; ?>
				</div>
                <div class="cate_product_item_info">
                    <span class="deal_common_info sale_prc2"><?php echo formatMoney($one['team_price']); ?>đ</span> 
                    <span class="deal_common_info discount_market">
                        <span><?php echo formatMoney($one['market_price']); ?>đ</span>
                    </span>
                    <span class="deal_common_info deal_number_buy_4">Có <span><?php echo $one['now_number']; ?></span>người đã cùng rẻ
                    </span>
                </div>
            </div>
            <?php }}?>
        </div>
    </div>
</div>
<!--End Cate deal--> 
<?php }?>