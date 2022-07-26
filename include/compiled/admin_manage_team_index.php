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
				<?php if($selector=='failure'){?>
                    <h2>Deal thất bại</h2>
				<?php } else if($selector=='success') { ?>
                    <h2>Deal thành công</h2>
				<?php } else { ?>
                    <h2>Deal hiện tại</h2>
				<?php }?>
                    <ul class="filter">
                        <li>
                        <form method="get">
                            Tên sản phẩm<input type="text" name="ptitle" class="h-input" value="<?php echo htmlspecialchars($ptitle); ?>" >
                            <select style="width:160px;" name="teamcate" class="h-input"><option value="">Chọn chuyên mục</option><?php echo Utility::Option($cates); ?></select>
                            <input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/>
                        </form>
                        </li>
                    </ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="20">ID</th><th width="350">Tên deal</th><th width="80" nowrap>Chuyên mục</th><th width="100">Ngày tháng</th><th width="50">L.Mua</th><th width="60" nowrap>Giá</th><th width="140">Thao tác</th></tr>
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
					<?php $oldstate = $one['state']; ?>
					<?php $one['state'] = team_state($one); ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></a></td>
						<td  style="text-align:left;">
							<a class="deal-title" href="<?php echo rewrite_team_id($one['id']); ?>" target="_blank" title="<?php echo $one['title']; ?>"><?php echo $one['product']; ?></a>
						</td>
                 
						<td nowrap>
                        	<?php if($one['city_id']==0){?>
                            	Tất cả thành phố<br /> 
                            <?php } else { ?>
                        		<?php echo $cities[$one['city_id']]['name']; ?><br />
                            <?php }?>  
                            <strong><?php echo get_name_cate($one['group_pid']); ?></strong>
                            <?php if($one['group_id']!=$one['group_pid']){?>
							<br />--<?php echo get_name_cate($one['group_id']); ?>
                            <?php }?>
                        </td>
						<td nowrap><?php echo date('d-m-Y',$one['begin_time']); ?><br/><?php echo date('d-m-Y',$one['end_time']); ?></td>
						<td nowrap><?php echo $one['now_number']; ?>/<?php echo $one['min_number']; ?></td>
						<td nowrap><?php echo formatMoney($one['team_price']); ?><?php echo $currency; ?><br/><span style="text-decoration:line-through"><?php echo formatMoney($one['market_price']); ?><?php echo $currency; ?></span></td>
						<td class="op" nowrap><a href="/ajax/manage.php?action=teamdetail&id=<?php echo $one['id']; ?>" class="ajaxlink">Chi tiết</a> | <a href="/manage/team/edit.php?id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=teamremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc xoá deal này không?" >Xoá</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="7"><?php echo $pagestring; ?></tr>
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
