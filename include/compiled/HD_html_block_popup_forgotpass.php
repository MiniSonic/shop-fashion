<div id="boxes">
    <div id="dialog" class="window">
        <div class="classic-popup">
            <div class="forgot-top">
                <span class="forgot-title">
                    <img alt="" src="<?php echo $template_path; ?>/top_bul.png" style="position: relative; top: 5px; float: left; margin: 5px;">
                    Chức năng phục hồi mật khẩu
                </span>
                <span class="close-icon" style="margin-left: 0px; margin-right: 0px;">
                    <a class="close" title="Đóng"><img src="<?php echo $template_path; ?>/new_close_btn.png"></a>
                </span>
            </div>
            <div class="huongdan">
                Xin nhập đúng địa chỉ email đã đăng ký tài khoản tại <?php echo $tenngan; ?>, sau đó nhập
                mã an toàn và gửi yêu cầu để được <?php echo $tenngan; ?> hỗ trợ. Cuối cùng hãy kiểm tra hộp email
                của bạn để lấy thông tin mật khẩu.(Nhớ kiểm tra cả hộp <b>SPAM</b> mail nữa.)
            </div>
            <div class="forgotform">
                <form id="frmgetpass" name="frmgetpass" method="post">
                <div class="forgot-item">
                    <span class="forgot-item-title">Nhập Email:</span> 
                    <span class="forgot-item-input"><input id="tbxForGotEmail" value="" name="tbxForGotEmail" style="width: 250px;" type="text"></span>
                </div>
                <div class="forgot-item">
                    <span class="forgot-item-title">Mã xác nhận:</span> 
                    <span class="forgot-item-input">
                        <input type="text" id="tbxForGotCaptcha" name="tbxForGotCaptcha" style="width: 120px;" maxlength="10" />
                    </span> 
                    <span class="cpt_img">
                    	<img id="cptGopYImg" alt="captcha" src="/captcha/captcha.php" title="Nhập mã xác nhận vào ô bên trái">
                        <img src="<?php echo $template_path; ?>/refreshcaptcha.png" alt="<?php echo $tenngan; ?> captcha" style="cursor:pointer;margin-top:7px;margin-left:5px;" id="btnRefreshFeedBackCaptcha">
                	</span>
                </div>
                </form>
                <div class="forgot-item">
                    <span class="forgot-item-title">&nbsp;</span> 
                    <span class="forgot-item-btn"><a href="#">Gửi</a></span>
                    <span class="fwaiting"><img alt="" src="<?php echo $template_path; ?>/ajax-loader1.gif"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Mask to cover the whole screen -->
</div>
