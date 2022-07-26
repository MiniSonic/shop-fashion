<div class="leftContent">
    <div id="divThongTinDeal">
        <div class="clear"></div>
        <div class="divDealItem">
             <div class="divMainBlock" style="width:760px;">
                <div class="divDealName">
                    <div class="divSaleOff">
                        <span>-<?php echo formatMoney($team['percent']); ?>%</span>
                    </div>
                    <div class="divTitle" style="background:#fff; padding-top:0;">
					<h1 style="color:red; margin-bottom:10px;"><?php echo $team['product']; ?></h1>
					<span style="font-size:13px;"><?php echo $team['title']; ?></span></div>
                </div>
                <div class="clear"></div>
                <div class="divDealInfo">
                    <div class="divRight">
                        <div id="divSlideShow<?php echo $team['id']; ?>" class="divIMGSlideShow">
                             <a><img title="<?php echo $team['product']; ?>" alt="<?php echo $team['product']; ?>" src="<?php echo team_image($team['image']); ?>" width="515" height="310" style="margin-top:10px; margin-left:5px"/></a>
                        </div>
                        <div style="padding-left: 5px; padding-top: 20px; font-weight: bold; font-size: 12pt;
                            color: #232323; float:left; width:60%">Có <span style="color: #84B005"><?php echo $team['view']+$team['pre_view']; ?></span> lượt xem sản phẩm này
                        </div>
                        <div class="cachgiaohang">
                            <span class="giao_<?php echo $team['delivery_type']; ?>"></span>
                            <?php echo $option_giaohang[$team['delivery_type']]; ?>
                        </div>
                    </div>
                    <div class="divLeft">
                        <div class="divPriceTag_Open">
                            <div class="divPriceTag">
                                <div class="divPrice">
                                    <div><?php echo formatMoney($team['team_price']); ?>đ</div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <?php $daytime = time();; ?>
                            <div class="detail_timer" diff="<?php echo $team['end_time']-$daytime; ?>" id="thoigian-1">
                            	<span id="dsthoigian-1"></span>
                            </div>
							<script language="javascript">
                                var sec = {};
                                function getInitTime(){
                                  $('div.detail_timer').each(function(){
                                     var jobj = $(this);
                                     var SysSecond = parseInt(jobj.attr('diff'));
                                     var theid = parseInt((jobj.attr('id')).replace(/thoigian-/,''));
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
                                        $("#dsthoigian-"+theid).html(""+hour+":"+minute+":"+second);
                                        
                                        sec[theid]--;
                                  }else{
                                        return;
                                  }
                                }
                                window.setInterval(SetRemainTime,1000);
                            </script>
                            <div class="divBtnBuy">
                                <a class="btnMuaNgay2 gopyfrm"  onclick="javascript:void(0);" href="#" title="Mua Ngay">&nbsp;</a>
                                <?php include template("block_deal_detail_optionbox");?>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="divThoiGian">
                            
                            <div style="font-weight: bold; margin-top: 10px;" class="div00 div02">
                                <div style="width: 100%; height: 25px;">
                                    <label><?php echo $team['now_number']; ?></label><span> người đã mua.</span>
                                    <label style="display: none;"><?php echo $team['now_number']-$team['pre_number']; ?></label>
                                </div>
                                <div class="divCProgress">
                                    <div class="divProgress" style="width: <?php echo $pro_percent; ?>px;"></div>
                                </div>
                            </div>
                            <div class="div00 div03">
                                <div class="deal_value">Giá gốc<span><?php echo formatMoney($team['market_price']); ?>đ</span></div>
                                <div class="deal_save">
                                	Tiết kiệm <span><?php echo formatMoney($team['market_price']-$team['team_price']); ?>đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="divShare">
                            <div class="left">Chia sẻ ngay:</div>
                            <div class="c">
                                <a href="http://facebook.com/sharer.php?u=http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo rewrite_team_id($team['id']); ?>" class="fb" target="_blank"></a>
                                <a href="http://twitter.com/share?url=http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo rewrite_team_id($team['id']); ?>" class="tt" target="_blank"></a>
                                <a href="http://www.google.com/bookmarks/mark?op=add&amp;bkmk=http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo rewrite_team_id($team['id']); ?>" class="tt" target="_blank">
                                </a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
					<script type="text/javascript">
                    $(window).load(function() {
                        $('#slider2').nivoSlider();
                    });
                    </script>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divDealFeature">
                <div class="dealCondition divBlock">
                    <div class="top_cover">Điều kiện sử dụng</div>
                    <div class="dealContent"><?php echo $team['notice']; ?></div>
                </div>
                <div class="dealFeature divBlock">
                    <div class="top_cover">Đặc điểm nổi bật</div>
                    <div class="dealContent"><?php echo $team['summary']; ?></div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        var h1 = $(".dealCondition", ".divDealFeature").height();
                        var h2 = $(".dealFeature", ".divDealFeature").height();
                        var h = h1 &gt; h2 ? h1 : h2;
                        $(".dealCondition,.dealFeature", ".divDealFeature").height(h);
                    });
                </script>
            </div>
            <div class="divDealDetail divBlock">
            	<div class="top_cover">Chi tiết sản phẩm</div>
            	<div class="dealContent"><?php echo $team['detail']; ?></div>
            </div>
            <div class="divBuyBottom">
                 <div class="div02">
                    <label>Giá gốc:</label>
                    <span class="price old"><?php echo formatMoney($team['market_price']); ?>đ</span>
                    <br />
                    <label>Tiết kiệm:</label>
                    <span class="price"><?php echo formatMoney($team['market_price']-$team['team_price']); ?>đ</span>
                </div>
                <div class="div03">
                    
                    <div class="dealOpen">
                        <span class="price"><?php echo formatMoney($team['team_price']); ?>đ</span>
                        <div class="divMua"><a title="Mua Ngay" href="#" class="btnMuaNgay2 gopyfrm"  onclick="javascript:void(0);"></a></div>
                    </div>
                    
                </div>
             
            </div>
            <div class="divBuyShadow"></div>
            <?php if($INI['option']['cmt_display']=='Y'){?>
            <div style="background:#f8f8f8;" class="divBlock_2 divDealDetail divDealComment">
                <div class="top_cover">Bình luận về sản phẩm</div>
                <div class="dealContent">
                	<div class="fb-comments" data-href="http://<?php echo $_SERVER['SERVER_NAME']; ?><?php echo rewrite_team_id($team['id']); ?>" data-num-posts="<?php echo $INI['option']['cmt_quantity']; ?>" data-width="700"></div>
                  
                </div>
            </div>
            <?php }?>
            <div class="clear"></div>
           
        </div>
        
        
    </div>
   
    <?php if(!$user_login_id){?>
    <?php include template("block_popup_detail_login");?>
    <?php }?>
    <div class="clear"></div>
    <div class="clear"></div>
    
</div>