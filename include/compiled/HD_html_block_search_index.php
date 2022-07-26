<div class="clear"></div>
<div class="product_top" style="margin-left: 10px; margin-top:5px; width: 760px !important;">
    <div class="product_top_title">
        <a href="javascript:void(0)">Kết quả tìm kiếm</a></div>
</div>
<div id="divDealGanNhat">
    <div class="listHotDeal">
    	<?php if(is_array($searchs)){foreach($searchs AS $one) { ?>
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

    <div class="clear"></div>
    <?php if($display_page){?>
    <?php echo $pagestring; ?>
    <?php }?>
    <div class="clear"></div>
    <input type="hidden" name="hdfActionURL" id="hdfActionURL" value="/Tim-kiem?page=">
    <form method="post" action="/Tim-kiem" name="formSearchDealInPage" id="formSearchDealInPage">
    </form>
</div>