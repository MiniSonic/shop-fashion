<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_team($selector); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				<?php if($selector=='expried'){?>
                    <h2>Deal sắp hết hạn</h2>
				<?php } else if($selector=='failure') { ?>
                    <h2>Deal thất bại</h2>
				<?php } else if($selector=='success') { ?>
                    <h2>Deal thành công</h2>
				<?php } else { ?>
                    <h2>Deal hôm nay</h2>
				<?php }?>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="40">ID</th><th width="400">Tên deal</th><th width="80" nowrap>Danh mục</th><th width="100">Ngày</th><th width="50">Đã bán</th><th width="60" nowrap>Giá</th><th width="140">Tác vụ</th></tr>
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
					<?php 
						$epx = strtotime(date('H:i Y-m-d',$one['end_time']));
						$today = strtotime(date( "Y-m-d", strtotime('+2 day') ));
						$now = strtotime(date('H:i Y-m-d'));
					; ?>
					<?php if($epx <= $today && $one['end_time'] >= $now){?>
					<?php $oldstate = $one['state']; ?>
					<?php $one['state'] = team_state($one); ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></a></td>
						<td>
						
							<a class="deal-title" href="/team.php?id=<?php echo $one['id']; ?>" target="_blank"><?php echo $one['product']; ?></a>
						</td>
						<td nowrap><?php echo $cities[$one['city_id']]['name']; ?><br/><?php echo $groups[$one['group_id']]['name']; ?></td>
						<td nowrap><?php echo date('Y-m-d',$one['begin_time']); ?><br/><?php echo date('Y-m-d',$one['end_time']); ?></td>
						<td nowrap><?php echo $one['now_number']; ?>/<?php echo $one['min_number']; ?></td>
						<td nowrap><?php echo number_format(moneyit($one['team_price']),0,'.','.'); ?><br/><?php echo number_format(moneyit($one['market_price']),0,'.','.'); ?></td>
						<td class="op" nowrap><a href="/ajax/manage.php?action=teamdetail&id=<?php echo $one['id']; ?>" class="ajaxlink">Chi tiết</a>｜<a href="/manage/team/edit.php?id=<?php echo $one['id']; ?>">Sửa</a>｜<a href="/ajax/manage.php?action=teamremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc muốn xóa không?" >Xóa</a><?php if((in_array($one['state'],array('success','soldout')))){?>｜<a href="/manage/team/down.php?id=<?php echo $one['id']; ?>" target="_blank"></a><?php }?></td>
					</tr>
					<?php }?>
					<?php }}?>
					
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
