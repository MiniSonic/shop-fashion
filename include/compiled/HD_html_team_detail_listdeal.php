<div id="Container">
    <div class="listHotDeal">
        <?php if(is_array($deal_others)){foreach($deal_others AS $deal_other=>$one) { ?>
        <div class="cate_product_item2">
            <div class="cate_product_item_img2">
                <a href="<?php echo rewrite_team_id($one['id']); ?>" target="_blank">
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
            <div class="cate_product_item_title2">
                <a href="<?php echo rewrite_team_id($one['id']); ?>" target="_blank"><?php echo $one['product']; ?></a>
            </div>
            <div class="cate_product_item_info2">
                <span class="deal_common_info2 sale_prc2"><?php echo formatMoney($one['team_price']); ?>đ</span> 
                <span class="deal_common_info2 discount_percent2">
                    <span>-<?php echo formatMoney($one['percent']); ?>%</span>
                </span>
                <span class="deal_common_info deal_cmny" style="display: none;">
                    <span><?php echo $one['bonus']; ?></span>
                </span>
                <span class="deal_common_info deal_number_buy2">
                    <span><?php echo formatMoney($one['view']+$one['pre_view']); ?></span>người xem
                </span>
                <!--<span class="deal_timer" id="tg2-<?php echo ++$count_timer2; ?>" diff="<?php echo $one['end_time']-$daytime; ?>">
                    <span class="divtimer" id="timer2-<?php echo $count_timer2; ?>"></span>
                </span>-->
            </div>
        </div>
        <?php }}?>
        <div class="clear"></div>
    	<?php if($page+1<=$maxpage){?>
        <div npage="<?php echo $page+1; ?>" class="divLoadingMore">
            <div class="imgLoading">
                <img width="20px" alt="loading..." src="<?php echo $template_path; ?>/ajax-loader.gif">
            </div>
            <div class="title">Xem Thêm</div>
        </div>
        <?php }?>
    </div>
</div>
