<div class="login_box">
    <div class="login_all_b">
        <div class="login_title">
            <span class="top_pop_left">
                <img alt="" src="<?php echo $template_path; ?>/top_bul.png" style="position: relative; top: 17px; float: left; margin-left: 5px;">
            </span>
            <span style="float: left; margin-left: 10px; text-transform: uppercase;">ĐĂNG NHẬP</span> 
            <span class="btnloginclose">
                <img alt="" src="<?php echo $template_path; ?>/new_close_btn.png" title="Tắt của sổ này" />
            </span>
        </div>
        <div class="login_content">
            <form action="#" method="post" id="frmloginPopup">
            <div class="login_item">
                <span class="login_ileft">Email:<span class="login_require">*</span></span> <span class="login_iright">
                    <input type="text" style="margin: 4px;" class="login_input" name="emailLogin" id="txtEmailPopup">
                </span>
            </div>
            <div class="login_item">
                <span class="login_ileft">Mật khẩu:<span class="login_require">*</span></span> <span class="login_iright">
                    <input type="password" style="margin: 4px;" class="login_input" name="passwordLogin" id="txtPasswordPopup">
                </span>
            </div>
            <div style="line-height: 25px; margin-left: 110px;" class="login_item">
                <input type="checkbox" name="cbPop_Remember" id="cbPop_Remember">&nbsp;<label for="cbPop_Remember">Ghi nhớ</label>
                &nbsp;|&nbsp;<a href="javascript:void(0)" class="forgotpass btnLink">Quên mật khẩu?</a>
            </div>
            <div style="line-height: 25px; margin-left: 110px;" class="login_item">
                <span>Chưa có tài khoản?</span> <a href="javascript:_JSRegister.ShowRegisterBox();" class="btnLink">Đăng ký</a>
            </div>
            <div style="line-height: 40px;" class="login_item">            
                <a id="btnLoginPopup" class="btnLoginButton" href="javascript:void(0);">Đăng nhập</a>
                <div class="login_loading_popup">
                    <img alt="" src="<?php echo $template_path; ?>/ajax-loader(1).gif">
                </div>
            </div>
            <div class="login_notice"></div>
            </form>
        </div>
    </div>
</div>
