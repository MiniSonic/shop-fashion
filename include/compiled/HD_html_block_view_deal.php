<div <?php if($is_slide==false){?> style="margin:0px;" <?php }?> class="ls_deal_of_category">
    <div class="ls_cate_product" style="width:1001px">
        <div class="product_top">
            <div class="product_top_title"><a href="javascript:void(0)"><?php echo $title_cate; ?></a></div>
        </div>
        <?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
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
		<script language="javascript">
            var sec = {};
            function getInitTime(){
              $('span.deal_timer2').each(function(){
                 var jobj = $(this);
                 var SysSecond = parseInt(jobj.attr('diff'));
                 var theid = parseInt((jobj.attr('id')).replace(/tg-/,''));
                 sec[theid]= SysSecond;
              });
            }
            getInitTime();
            function SetRemainTime() {
                for(var i in sec){
                    setRemainTimeSite(i,sec[i]);
                }
            }
            
            function setRemainTimeSite(theid,SysSecond){
            
              if (SysSecond > 0) {
                    SysSecond = SysSecond - 1;
                    var second = Math.floor(SysSecond % 60).toString();
                    var minute = Math.floor((SysSecond / 60) % 60).toString();
                    /*var hour = Math.floor((SysSecond / 3600) % 24).toString();*/
                    var hour = Math.floor(SysSecond / 3600).toString();
                    /*var day = Math.floor((SysSecond / 3600) / 24).toString();*/
                    if(hour<10) {hour = '0'+hour}
                    else{ if(hour<100) {hour = ''+hour;}}
                    if(minute<10) {minute = '0'+minute};
                    if(second<10) {second = '0'+second};
                    /*if(day>=1) $("#thoigiands-"+theid).html(""+day+" ngày");*/
                    /*else $("#thoigiands-"+theid).html(""+hour+":"+minute+":"+second);*/
                    $("#timer-"+theid).html(""+hour+":"+minute+":"+second);
                    
                    sec[theid]--;
              }else{
                    return;
              }
            }
            window.setInterval(SetRemainTime,1000);
        </script>
    </div>
    <div class="clear"></div>
    <?php echo $pagestring; ?>
    
</div>

