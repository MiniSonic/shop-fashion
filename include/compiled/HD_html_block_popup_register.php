<div class="register-popup">
    <div class="mem-register">
        <div class="popup-title" style="">
            <span class="title">Đăng ký thành viên <?php echo $tenngan; ?></span>
            <span class="btnClose"><a href="javascript:void(0)" title="Đóng"></a></span>
        </div>
        <input id="RegisterPoint" value="" type="hidden">
        <div class="register-message" style="text-indent: 30px;">Đăng ký thành công </div>
        <iframe id="ifpost" name="ifpost" class="hide" src=""></iframe>
        <form id="RegisterForm" name="RegisterForm" method="post" action="/dang-ky/">
        <div class="info_box">
            <div class="register-content">
                <div class="reg-note">
                    <span style="float: left; margin-left: 4px; margin-top: 5px; color: red; font-size: 12px;">
                        * Vui lòng điền đầy đủ thông tin bên dưới.
                    </span>
                </div>
                <div class="basic_info">
                    <div class="regist_item">
                        <span class="regist_title">Họ và tên:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input id="tbxFullName1" name="FullName_s" type="text"></span></div>
                    <div class="regist_item">
                        <span class="regist_title">Email:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input id="tbxEmailRegist1" name="Email_s" type="text"></span></div>
                    <div class="regist_item">
                        <span class="regist_title">Mật khẩu:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input id="tbxPassRegist1" name="Password_s" type="password"></span></div>
                    <div class="regist_item">
                        <span class="regist_title">Nhập lại mật khẩu:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input id="tbxRePassRegist1" name="RePassword_s" type="password"></span></div>
                    <div class="regist_item">
                        <span class="regist_title">Giới tính:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select class="" id="ddlRegistSex1" name="Gender_b" style="width: 100px;">
                                <option selected="selected" value="3">Chọn</option>
                                <option value="M">Nam</option>
                                <option value="F">Nữ</option>
                            </select>
                        </span>
                    </div>
                    <div class="regist_item">
                        <span class="regist_title">Ngày sinh:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select class="birth_ddl" id="ddlRegistBirthday1" name="ddlRegistBirthday" style="">
                            	<?php echo Utility::Option($option_days,'','Ngày'); ?>
                            </select>
                            <select class="birth_ddl" id="ddlRegistBirthMonth1" name="ddlRegistBirthMonth" style="margin-left: 5px;">
                            	<?php echo Utility::Option($option_months,'','Tháng'); ?>
                            </select>
                            <select class="birth_ddl" id="ddlRegistBirthYear1" name="ddlRegistBirthYear" style="margin-left: 5px;">
                            	<?php echo Utility::Option($option_years,'','Năm'); ?>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="basic_info">
                    <div class="regist_item">
                        <span class="regist_title">Tỉnh thành:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select id="Province1" name="Province" style="width: 205px;">
                            	<?php echo Utility::Option($option_provinces,'','Chọn Thành Phố'); ?>
                            </select>
                        </span>
                    </div>
                    <div class="regist_item">
                        <span class="regist_title">Quận huyện:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select id="District1" name="DistrictID_s" style="width: 205px;">
                            	<option value="0">Chọn Quận Huyện</option>
                            </select>
                        </span>
                    </div>
					<div class="regist_item">
                        <span class="regist_title">Phường Xã:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select id="Ward1" name="WardID_s" style="width: 205px;">
                            	<option value="0">Chọn Phường Xã</option>
                            </select>
                        </span>
                    </div>
                    <div class="regist_item">
                        <span class="regist_title">Địa chỉ:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input"><input id="tbxAddress1" name="Address_s" type="text"></span>
                    </div>
                    <div class="regist_item">
                        <span class="regist_title">Điện thoại:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <input id="tbxPhone1" name="Mobile_s" onkeypress="blockNotNumber(event)" maxlength="15" type="text">
                        </span>
                    </div>
                    <div class="regist_control" style="position:relative">
                    	<span class="reg_loading" style="display: none; position:absolute; top:25px; left:150px">
                            <img alt="" src="/include/template/thietketrangchu/css/images/ajax-loader1.gif">
                        </span>
                        <span class="regist_btn1" style="margin-top: 20px;"><a href="javascript:void(0)">Đăng ký</a></span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!-- end div.register-content -->
            <div class="clear"></div>
        </div>
        <!-- end div.info_box -->
        <div class="clear"></div>
        </form>
        <div class="clear"></div>
    </div>
</div>
