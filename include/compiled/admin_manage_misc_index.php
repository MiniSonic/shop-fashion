<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="help">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
    				</div>
                <div class="sect">
					<div class="wholetip clear"><h3>Thống kê hôm nay</h3></div>
					<div style="margin:0 20px;">
						<h6><span  style="color:red">Mua hàng nhanh:</span> <?php echo $count_now; ?></h6>
					</div>
					<div class="wholetip clear"><h3>Thông kê chung</h3></div>
					<div style="margin:0 20px;">
						<p>Tổng số deal <b><?php echo $team_count; ?></b></p>
						<h6><span  style="color:red">Mua hàng nhanh:</span> <?php echo $count_all; ?></h6>
						
					</div>
				</div>
			</div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
