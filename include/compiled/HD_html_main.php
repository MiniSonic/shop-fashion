<?php include template("header");?>
<?php if($INI['option']['pop_center_display']=='Y'){?>
<?php include template("block_popup_center");?>
<?php }?>
<!--rightContent-->
<div class="leftContent">
	
    <div class="clear"></div>
    <div class="clear"></div>
    <?php include template("block_slider");?>
    <div class="clear"></div>
    <div class="clear"></div>
    
</div><!--End rightContent-->

<!--leftContent-->
<div class="rightContent">
    <?php include template("block_cate_menu2");?>
</div><!--End leftContent-->

<div class="clear"></div>

<!--Show product-->
<div class="ls_cate_home_product">
	<?php include template("block_new_deal");?>
    <?php include template("block_ads_cate1");?>
    <?php include template("block_cate1");?>
    <?php include template("block_ads_cate2");?>
    <?php include template("block_cate2");?>
    <?php include template("block_cate3");?>
    <?php include template("block_cate4");?>
    <?php include template("block_cate5");?>
    <?php include template("block_cate6");?>
    <?php include template("block_cate7");?>
    <?php include template("block_cate8");?>
    <?php include template("block_cate9");?>
    <?php include template("block_cate10");?>
    <?php include template("block_cate11");?>
    <?php include template("block_cate12");?>
<script language="javascript">
	var sec = {};
	function getInitTime(){
	  $('span.deal_timer').each(function(){
		 var jobj = $(this);
		 var SysSecond = parseInt(jobj.attr('diff'));
		 var theid = parseInt((jobj.attr('id')).replace(/tg-/,''));
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
			$("#timer-"+theid).html(""+hour+":"+minute+":"+second);
			
			sec[theid]--;
	  }else{
			return;
	  }
	}
	window.setInterval(SetRemainTime,1000);
</script>
    
</div><!--End show product-->
<div class="clear"></div>
<?php include template("footer");?>

