<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_order($cur_here); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                <h2>Mua hàng nhanh</h2>
                    <ul class="filter">
                        <li>
                        <form method="get">
                            Mã đơn hàng<input type="text" name="order_code" class="h-input number" value="<?php echo htmlspecialchars($order_code); ?>" />
                            Email<input type="text" name="email" class="h-input" value="<?php echo htmlspecialchars($email); ?>" />
                            SĐT<input type="text" name="mobile" class="h-input number" value="<?php echo htmlspecialchars($mobile); ?>" />
                            <input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/>
                        </form>
                        </li>
                    </ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr class="forum_title_tr">
                        <th width="40">ID</th>
						<th width="200">Khách hàng</th>
                        <th>Tên sản phẩm</th>
                           <th width="100" nowrap>Sốlượng</th>
                           <th width="100" nowrap>Đơn giá</th>
                        <th width="100" nowrap>Thành tiền</th>                    
                        <th width="150" nowrap>Thao tác</th>
                  	</tr>
					<?php if(is_array($orders)){foreach($orders AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><b><?php echo $one['name']; ?></b>
						</td>
						<td><?php echo $teams[$one['team_id']]['product']; ?></td>
						<td><?php echo $one['number']; ?></td>
						<td><?php echo formatMoney($teams[$one['team_id']]['team_price']); ?><?php echo $currency; ?></td>
						<td><?php echo formatMoney($one['number']*$teams[$one['team_id']]['team_price']); ?><?php echo $currency; ?></td>
						<td class="op" nowrap style="text-align:center">
                      <a href="/ajax/manage.php?action=orderdetail2&id=<?php echo $one['id']; ?>" class="ajaxlink">Chi tiết</a> | 
					  <a href="/ajax/manage.php?action=xoa&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc muốn xóa đơn hàng này không?">Xóa</a>
					  <br/>
					  <form>
						<select name="cate" ONCHANGE="window.location='./index.php?act=tracking&idd=<?php echo $one['id']; ?>&page=<?php echo $_REQUEST['page']; ?>&value='+this.options[this.selectedIndex].value"><?php echo Utility::Option($tracking, $one['track']); ?> </select>
						</form>
                        </td>
					</tr>
					<?php }}?>
					<tr><td colspan="10"><?php echo $pagestring; ?></tr>
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
