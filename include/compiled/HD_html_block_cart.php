<div style="background-color:#fff;padding-bottom:20px;border-radius:3px;" class="personal_page">
    <div class="wrap_cart">
        <div class="cart_top">&nbsp;</div>
        <div class="cart_content">
            <div class="cart_title">
                <span style="margin-left: 10px;" class="c_title-ico">
                    <img src="<?php echo $template_path; ?>/title_ico.png" alt="">
              	</span> 
                <span class="c_title_text">thông tin đơn hàng của bạn</span>
            </div>
            <!-- begin cart content -->
            <div class="cart_content_title">
                <span class="title-del">Xóa</span> <span class="title-product">Sản phẩm/Dịch vụ</span>
                <span class="title-price">Đơn giá</span> <span class="title-soluong">Số lượng</span>
                <span class="title-thanhtien">Thành tiền
                    <span style="margin:0px;padding:0px;float:right;" class="thanhtoan_viewdetail"><span style="margin:0px;padding:0px;text-align:left;text-align:left;"></span></span>
                </span>
                
            </div>
            <?php if(empty($carts)){?>
            <div class="cart_listitem">
            	<div style="width:100%;float:left;color:red;text-align:center;line-height:50px;">Giỏ hàng trống</div>
            </div>
            <?php } else { ?>
            <div class="cart_listitem">
				<?php if(is_array($carts)){foreach($carts AS $index=>$one) { ?>
                <?php 
                    $hdOptionValue = $one['deal_info'];
                    $info_id = intval(substr($hdOptionValue,-1));
                    $deal_id = intval(substr($hdOptionValue,0,-1));
                	$teams = Table::Fetch('team', $deal_id);
                    $info = 'infop'.$info_id;
                    $max_quantity = $teams['max_number'] - $teams['now_number'];
                    $quantity = $one['quantity'];
                    $price_sum = $quantity * $teams['team_price'];
                    $price_total += $price_sum;
                    $teams[$info] =  $teams[$info]?$teams[$info]:'Chọn ngẩu nhiên'; 
                ; ?>
                <div class="cart_item">
                    <div class="item_row">
                        <span style="margin-left: 0px;" class="title-del">
                        	<a title="Xóa sản phẩm này" href="javascript:">
                            	<img title="Xóa sản phẩm này" src="<?php echo $template_path; ?>/btn_del_item.png" alt="">
                       		</a>
                     	</span>
                   	</div>
                    <div class="item_row">
                        <span style="text-align: left;" class="title-product">
                        	<a href="<?php echo rewrite_team_id($deal_id); ?>">
                            &nbsp;<?php echo $teams['product']; ?>[<i style="color: #E7433C;"><?php echo $teams[$info]; ?></i>]
                           	</a>
                   		</span>
                  	</div>
                    <div class="item_row">
                        <span class="title-price"><?php echo formatMoney($teams['team_price']); ?></span></div>
                    <input type="hidden" value="<?php echo $hdOptionValue; ?>" id="hdDealIfoID">
                    <input type="hidden" value="<?php echo $teams['team_price']; ?>" id="price">
                    <input type="hidden" value="<?php echo $max_quantity; ?>" id="numAvalidable">
                    <input type="hidden" value="0" id="IsDealService">
                    <div class="item_row">
                        <span class="title-soluong">
                            <input type="text" onkeypress="blockNotNumber(event)" maxlength="2" style="width: 35px; text-align: center;margin-left:2px;float:left;" value="<?php echo $quantity; ?>" name="tbxQuantity" id="tbxQuantity">
                            <span style="margin: 0px;margin-left:3px; position: relative;top:5px;">
                                <img class="up_quantity" src="<?php echo $template_path; ?>/cart_quantity_up.png" alt="">
                                <img class="down_quantity" src="<?php echo $template_path; ?>/cart_quantity_down.png" alt="">
                            </span>
                        </span>
                    </div>
                    <div class="item_row"><span class="title-thanhtien tientratruoc"><?php echo formatMoney($price_sum); ?></span></div>
                  
                </div>
                <?php }}?>
                <!-- end div.cart_item -->
                
                <div class="sum_item">
                    <span class="sum_item_title"><p>Tổng cộng&nbsp;</p></span>
                    <span class="sum_item_value_price"><p><?php echo formatMoney($price_total); ?></p></span>
                    
                </div>
                <div style="background: #e9e9e9; font-weight: bold;display:none;" class="sum_item">
                    <span class="sum_item_title"><p>Tổng tiền thanh toán&nbsp;</p></span>
                    <span class="sum_item_value_total"><p>0</p></span>
                </div>
                
            </div>
            <?php }?>
            <div class="continous-shop">
                <span class="btn_ctn_b"><a href="/">Tiếp tục mua hàng</a></span>
            </div>
            
            <div class="finish_order">
            	<?php if($login_user){?>
                <span class="btn_finish_o"><a href="/ThanhToan" id="btn_Order">Thanh toán</a></span>
                <?php } else { ?>
                <span class="btn_finish_o"><a href="#" id="btn_Order">Thanh toán</a></span>
                <?php }?>
            </div>
            
            <!-- end cart content -->
        </div>
        
        <?php if(!$login_user){?>
        <!--{//include block_cart_notlogin}-->
        <?php include template("block_cart_login");?>
        <?php include template("block_cart_regist");?>
        <?php }?>
        
    </div><!-- end div.wrap_cart -->
</div>