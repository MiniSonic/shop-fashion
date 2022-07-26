<?php 
    $daytime = time();
    $cond_new = array(
        'city_id' => array(0, abs(intval($city['id']))),
        "begin_time <= '$daytime'",
        "end_time > '$daytime'",
    );

    $newteams = DB::LimitQuery('team', array(
        'condition' => $cond_new,
        'order' => 'ORDER BY sort_order DESC, begin_time DESC,  id DESC',
        'size' => $INI['system']['new_deal_item'],
    ));
; ?>
<!--New deal-->
<div class="title_main" style="padding-top: 15px">
                <p class="icon_home"><a class="icon_home"></a></p>
                <h1 class="title_catalog">Khuyến mãi hot</h1>
            <ul class="filter">
                <li><a class="" href="/khuyen-mai-moi-nhat.html">Mới nhất</a></li>
                <li><a class="" href="/khuyen-mai-ban-chay.html">Bán chạy</a></li>
                <li><a class="" href="/khuyen-mai-top-50.html">Top 50</a></li>                
                <li><a class="active" href="/">Tất cả</a></li>
            </ul>
        </div>
<div class="showproduct_cate new_deal">
    <div class="product_cate_content">
        <div class="ls_cate_product" style="width: auto">
            <?php if(is_array($newteams)){foreach($newteams AS $index=>$one) { ?>
            <div class="cate_product_item">
                <div class="cate_product_item_img">
				<span class="deal_common_info discount_percent_nhanhoa">
                        <span>-<?php echo formatMoney($one['percent']); ?>%</span>
                    </span>
                	<?php if($team_type!='normal'){?>
                    <span class="ribbon3_<?php echo $one['team_type']; ?>"></span>
                    <?php }?>
                    <a href="<?php echo rewrite_team_id($one['id']); ?>">
                        <img alt="<?php echo $one['product']; ?>, <?php echo $INI['system']['keywordseo']; ?>" src="<?php echo team_image($one['image']); ?>" />
                    </a>
                    <div class="cate_product_delivery">
                    	<span class="cate_product_damua">&nbsp;Đã mua <span><?php echo $one['now_number']; ?></span></span>
                    	<span class="cate_product_giaohang">
                        	<span class="giao_<?php echo $one['delivery_type']; ?>"></span>
                            <?php echo $option_giaohang[$one['delivery_type']]; ?>
                        </span>
                    </div>
                </div>
                <div class="cate_product_item_title">
                    <a href="<?php echo rewrite_team_id($one['id']); ?>"><?php echo $one['product']; ?></a>
                </div>
                <div class="cate_product_item_info">
                    <span class="deal_common_info sale_prc"><?php echo formatMoney($one['team_price']); ?>đ</span> 
                    <span class="deal_common_info discount_percent">
                        <span><a class="btnXemNgay" href="<?php echo rewrite_team_id($one['id']); ?>" title="XEM">XEM</a></span>
                    </span>
                    <span class="deal_common_info deal_cmny" style="display: none;">
                        <span><?php echo $one['bonus']; ?></span>
                    </span>
                    <span class="deal_common_info deal_number_buy">
                        <span><?php echo formatMoney($one['view']+$one['pre_view']); ?></span>người xem
                    </span>
                    <span class="deal_timer" id="tg-<?php echo ++$count_timer; ?>" diff="<?php echo $one['end_time']-$daytime; ?>">
                    	<span class="divtimer" id="timer-<?php echo $count_timer; ?>"></span>
                    </span>
                </div>
            </div>
            <?php }}?>
        </div>
    </div>
</div><!--End new deal-->
