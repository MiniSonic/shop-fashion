<div style="display:inline;" class="cart_regist">
    <div style="cursor:pointer;" class="cart_title">
        <span class="c_title-ico"><img src="<?php echo $template_path; ?>/title_ico.png" alt="<?php echo $tenngan; ?>"></span>
        <span class="c_title_text">đăng ký thành viên của <?php echo $tenngan; ?></span>
    </div>
    <div style="display: none;" class="info_box">
        <div class="info_box_top">
            <img src="<?php echo $template_path; ?>/order_box_top.png" alt=""></div>
        <div class="info_box_content">
            <div class="regist_note">
                <span style="float: left; margin-left: 4px; margin-top: 5px; color: #22272C; font-size: 12px;">
                    * Vui lòng điền đầy đủ thông tin bên dưới.</span></div>
            <div class="basic_info">
                <div class="regist_item">
                    <span class="regist_title">Họ và tên:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input type="text" name="tbxFullName" id="tbxFullName"></span></div>
                <div class="regist_item">
                    <span class="regist_title">Email:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input"><input type="text" name="tbxEmailRegist" id="tbxEmailRegist"></span>
               	</div>
                <div class="regist_item">
                    <span class="regist_title">Mật khẩu:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input"><input type="password" name="tbxPassRegist" id="tbxPassRegist"></span>
             	</div>
                <div class="regist_item">
                    <span class="regist_title">Nhập lại mật khẩu:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input"><input type="password" name="tbxRePassRegist" id="tbxRePassRegist"></span>
               	</div>
                <div class="regist_item">
                    <span class="regist_title">Giới tính:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select style="width: 100px;" name="ddlRegistSex" id="ddlRegistSex" class="">
                            <option value="N">Chọn</option>
                            <option value="M">Nam</option>
                            <option value="F">Nữ</option>
                        </select>
                    </span>
                </div>
                <div class="regist_item">
                    <span class="regist_title">Ngày sinh:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select name="ddlRegistBirthday" id="ddlRegistBirthday" class="birth_ddl">
                            <?php echo Utility::Option($option_days,'','Ngày'); ?>
                        </select>
                        <select style="margin-left: 5px;" name="ddlRegistBirthMonth" id="ddlRegistBirthMonth" class="birth_ddl">
                            <?php echo Utility::Option($option_months,'','Tháng'); ?>
                        </select>
                        <select style="margin-left: 5px;" name="ddlRegistBirthYear" id="ddlRegistBirthYear" class="birth_ddl">
                            <?php echo Utility::Option($option_years,'','Năm'); ?>
                        </select>
                    </span>
                </div>
            </div>
            <div class="basic_info">
                <div class="regist_item">
                    <span class="regist_title">Tỉnh thành:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select style="width: 205px;" name="Province" id="Province">
                            <?php echo Utility::Option($option_provinces,'','Chọn Tỉnh Thành'); ?>
                        </select>
                    </span>
                </div>
                <div class="regist_item">
                    <span class="regist_title">Quận huyện:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select style="width: 205px;" name="District" id="District">
                        	<option selected="selected" value="0">Chọn Quận Huyện</option>
                        </select>
                    </span>
                </div>
				<div class="regist_item">
                    <span class="regist_title">Phường xã:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select style="width: 205px;" name="Ward" id="Ward">
                        	<option selected="selected" value="0">Chọn Phường Xã</option>
                        </select>
                    </span>
                </div>
                <div class="regist_item">
                    <span class="regist_title">Địa chỉ:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input"><input type="text" name="tbxAddress" id="tbxAddress"></span>
                </div>
                <div class="regist_item">
                    <span class="regist_title">Điện thoại:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <input type="text" maxlength="15" onkeypress="blockNotNumber(event)" name="tbxPhone" id="tbxPhone">
                    </span>
                </div>
                <div class="regist_control" style="position:relative">
                    <span class="reg_loading" style="display: none; position:absolute; top:25px; left:150px">
                        <img alt="" src="/include/template/thietketrangchu/css/images/ajax-loader1.gif">
                    </span>
                    <span style="margin-top: 20px;" class="regist_btn"><a href="Javascript:">Đăng ký</a></span>
                </div>
            </div>
        </div>
        <!-- end div.info_box_content -->
        <div class="info_box_bottom"><img src="<?php echo $template_path; ?>/order_box_bottom.png" alt=""></div>
    </div>
    <!-- end div.info_box -->
</div>
