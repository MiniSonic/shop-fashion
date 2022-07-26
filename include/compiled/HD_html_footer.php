<div class="clear"></div>
    </div><!--End divContent-->
 <div id="mask"></div>	
	</div><!--End divMain-->
    <!--footer-->
	<div class="support_online">
	<div class="gotop"><a href="#"></a></div>
</div>
    <div id="Footer">
        <div class="divFooterContent">
		<div class="FooterCate">
           <div>
            <?php 
            	$cates = DB::LimitQuery('cate', array('condition'=>array('display'=>'Y', 'cate_type'=>'deal')));
           	; ?>	
                <?php if(is_array($cates)){foreach($cates AS $one) { ?>
            	<a href="<?php echo rewrite_cate_shop($one['id']); ?>" title="<?php echo $one['name']; ?>"><?php echo $one['name']; ?></a> | 
                <?php }}?>
			<br/>	<br/>
			<a href="/ve-chung-toi" title="Về <?php echo $tenngan; ?>">Về chúng tôi</a> |
			<a href="/quy-che-san-giao-dich" title="Quy chế Sàn giao dịch">Quy chế Sàn giao dịch</a> |
			<a href="/tai-khoan-va-don-hang" title="Cách thức mua hàng">Tài khoản và đơn hàng</a> |
			<a href="/giao-nhan-hang" title="Giao nhận hàng">Giao nhận hàng</a> |
			<a href="/hop-tac-kinh-doanh" title="Hợp tác với <?php echo $tenngan; ?>">Hợp tác với <?php echo $tenngan; ?></a> |
        	</div>
			
			
		</div>	
		<div class="clear"></div>
            <div class="cMenu ">
            <table align="center" class="footer_content">
		<tbody><tr>
			<td valign="top">
				<div class="add_city fl">
					<p class="bold">Công ty TNHH Cùng Rẻ</p>
					<p>131 Trần Não P.Bình An
</p>
					<p>Quận 2, TP. Hồ Chí Minh</p>
					<p>Điện thoại/Fax: 08.668.21204 (8 line)</p>
			   </div>
			   			 
			   			</td>
   
							<td valign="top">
					<div class="add_city fl">
						<p><b>1. Đông Á(CN: Hóc Môn):</b> 010 511 03 40</p>
						<p><b>2. Sacombank (CN: Q2):</b> 060.0384.03.624</p>
						<p><b>3. Vietinbank (CN: Q1):</b> 007.1002.190.165</p>
						<p><b>4. Á Châu (CN: Q2):</b> 160.46.43.49</p>
						
					</div>
				</td>
						<td valign="top">
				<div>
					<a class="mobile" href="#" title="Bản mobile"><i class="icon_phone"></i>Chúng tôi chia sẽ</a>
				</div>
				<div class="rss_block fl">
			      <a class="facebook fl" target="_blank" href="<?php echo $INI['system']['facebook']; ?>"></a>
			      <a class="youtube fl" target="_blank" href="#"></a>
			      <a class="yahoo fl" target="_blank" href="<?php echo $INI['system']['facebook']; ?>"></a>
			      <a class="rss fl" target="_blank" href="#"></a>
			      <div class="clear"></div>
			      <a class="coporation fl" target="_blank" href="/hop-tac-kinh-doanh"></a>
			   </div>
			</td>
			<td valign="top">
				<!-- Link xác thực tài khoản bảo kim -->
				<div class="authenticationBK">
					<a target="_blank" title="Chứng nhận xác thực thanh toán qua baokim.vn" href="#"><img src="/img/baokim_xt.jpg"></a>
				</div>
			</td>
	   </tr>
   </tbody></table>    
			<input type="hidden" name="_ref" value="<?php echo getSession()?getSession():0; ?>"/>
                <div class="clear"></div>
            </div>
            
        </div>
    </div><!--End footer-->
 <?php include template("html_footer");?>
