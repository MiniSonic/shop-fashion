<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_order('export'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>Tải đơn hàng</h2>
				</div>
                <div class="sect">
                    <form method="post" target="" class="validator">
                        <div class="field">
                            <label>Thời gian bắt đầu</label>
							<input type="text" size="30" maxlength="30" name="begintime" require="true" class="number" value="<?php echo date('d-m-Y',strtotime('-1 months')); ?>"  onFocus="WdatePicker({isShowClear:false,readOnly:true})" />

                            <label>Thời gian kết thúc</label>
							<input type="text" size="30" maxlength="30" name="endtime" require="true" class="number" value="<?php echo date('d-m-Y',$daytime); ?>"  onFocus="WdatePicker({isShowClear:false,readOnly:true})" />
                        
                        </div>
<!---
                        <div class="field">
                            <label>Tình trạng đơn hàng</label>
                            <div style="padding-top:8px;">
                            	<?php if(is_array($option_order_state)){foreach($option_order_state AS $index=>$one) { ?>
                                <input type="checkbox" name="order_state[]" value="<?php echo $index; ?>" checked /><?php echo $one; ?>
                                <?php }}?>
                          	</div>
                        </div>
                        <div class="field">
                            <label>Tình trạng T.toán</label>
                            <div style="padding-top:8px;">
                            	<?php if(is_array($option_pay)){foreach($option_pay AS $index=>$one) { ?>
                                <input type="checkbox" name="pay_state[]" value="<?php echo $index; ?>" checked /><?php echo $one; ?>
                                <?php }}?>
                          	</div>
                        </div>
-->
                        <div class="act" style="margin-top:30px">
                            <input type="submit" value="Tải về" name="commit" class="formbutton" />
                        <!--    <input type="reset" value="Làm lại" name="reset" class="formbutton" />-->
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
