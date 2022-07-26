<div class="option_box">
    <div class="select_option">
        <div class="all_option_area">
            <form method="post" name="AddToCart" id="AddToCart">
            <div class="select_title">
                <span class="top_pop_left">
                    <img style="position: relative;
                        top: 17px; float: left; margin-left: 5px;" src="/include/template/<?php echo $INI['skin']['template']; ?>/css/images/top_bul.png" alt="">
                </span>
                <span style="float: left; margin-left: 10px; text-transform: uppercase;">Vui lòng chọn mẫu sản phẩm bên dưới</span> 
                <span class="btnclose">
					<img title="<?php echo $INI['system']['abbreviation']; ?> - Tắt của sổ này" src="/include/template/<?php echo $INI['skin']['template']; ?>/css/images/new_close_btn.png" alt="">
				</span>
            </div>
            <div class="option_list">
                <div style="width: 100%; float: left; line-height: 22px; margin-top: 5px;">
                    <span style="float: left; color: #5D9F06; margin-left: 15px; font-weight: bold;">Chọn nhiều sản phẩm bằng cách click vào hình</span>
                </div>
                <input type="hidden" value="<?php echo $team['id']; ?>" id="dealID" name="dealID">
                <ul class="img_ls">
                	<?php if($team['image7']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>1" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>1" title="<?php echo $team[infop1]; ?>" class="preview" href="<?php echo team_image($team['image7']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop1]; ?>" src="<?php echo team_image($team['image7']); ?>">
                  		</a>
                	</li>
                    <?php } else { ?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>0" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>0" title="" class="preview" href="" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="" src="">
                  		</a>
                	</li>
                    <?php }?>
                	<?php if($team['image8']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>2" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>2" title="<?php echo $team[infop2]; ?>" class="preview" href="<?php echo team_image($team['image8']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop2]; ?>" src="<?php echo team_image($team['image8']); ?>">
                  		</a>
                	</li>
                    <?php }?>
                	<?php if($team['image9']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>3" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>3" title="<?php echo $team[infop3]; ?>" class="preview" href="<?php echo team_image($team['image9']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop3]; ?>" src="<?php echo team_image($team['image9']); ?>">
                  		</a>
                	</li>
                    <?php }?>
                	<?php if($team['image10']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>4" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>4" title="<?php echo $team[infop4]; ?>" class="preview" href="<?php echo team_image($team['image10']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop4]; ?>" src="<?php echo team_image($team['image10']); ?>">
                  		</a>
                	</li>
                    <?php }?>
                	<?php if($team['image11']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>5" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>5" title="<?php echo $team[infop5]; ?>" class="preview" href="<?php echo team_image($team['image11']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop5]; ?>" src="<?php echo team_image($team['image11']); ?>">
                  		</a>
                	</li>
                    <?php }?>
                	<?php if($team['image12']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>6" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>6" title="<?php echo $team[infop6]; ?>" class="preview" href="<?php echo team_image($team['image12']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop6]; ?>" src="<?php echo team_image($team['image12']); ?>">
                  		</a>
                	</li>
                    <?php }?>
                	<?php if($team['image13']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>7" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>7" title="<?php echo $team[infop7]; ?>" class="preview" href="<?php echo team_image($team['image13']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop7]; ?>" src="<?php echo team_image($team['image13']); ?>">
                  		</a>
                	</li>
                    <?php }?>
                	<?php if($team['image14']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>8" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>8" title="<?php echo $team[infop8]; ?>" class="preview" href="<?php echo team_image($team['image14']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop8]; ?>" src="<?php echo team_image($team['image14']); ?>">
                  		</a>
                	</li>
                    <?php }?>
                	<?php if($team['image15']){?>
                    <li>
                    	<span class="cb_select_opt">
                    		<input type="checkbox" class="cb_cll_opt" name="cbOptionSelect" id="cbOptionSelect_<?php echo $team['id']; ?>9" />
                            <input type="hidden" value="" name="hdOptionValue[]" id="hdOptionValue" />
                  		</span>
                        <a id="dealopt_<?php echo $team['id']; ?>9" title="<?php echo $team[infop9]; ?>" class="preview" href="<?php echo team_image($team['image15']); ?>" style="background-image:none;width:50px;display:inline;">
                        	<img class="p_sml_img_sls" alt="<?php echo $team[infop9]; ?>" src="<?php echo team_image($team['image15']); ?>">
                  		</a>
                	</li>
                    <?php }?>
                </ul>
            </div>
            <div class="op_select_notice">
                <table>
                    <thead>
                        <tr>
                        	<td>STT</td>
                            <td>Tên lựa chọn</td>
                            <td>Số lượng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>do xanh
                            </td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>do xanh</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>do xanh</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="select_option_control">
                <span class="control_button">
                    <img title="Đặt mua hàng tại <?php echo $tenngan; ?>" src="/include/template/<?php echo $INI['skin']['template']; ?>/css/images/dat_mua_btn.png" alt="<?php echo $tenngan; ?> - Dat mua hang"></span>
            </div>
            </form>
        </div>
    </div>

</div>
