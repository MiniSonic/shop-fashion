<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:600px;">
	<h3>Chi tiết đơn hàng số <?php echo $order['order_code']; ?><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Đóng</span></h3>
	<div style="overflow-x:hidden;padding:10px;" id="dialog-order-id" oid="<?php echo $order['id']; ?>">
	<input type="hidden" id="user_id" value="<?php echo $order['user_id']; ?>">
	<table width="96%" align="center" class="coupons-table" style="line-height:22px;">
		<tbody>
        	<tr class="forum_title_tr">
            	<th>STT</th><th>Tên sản phẩm / Dịch vụ</th>
                <th>Đơn giá</th><th>Số lượng</th><th>Thành tiền</th>
          	</tr>
            <?php if(is_array($team_orders)){foreach($team_orders AS $index=>$team) { ?>
            <?php if($index%2==0){?>
            <tr class="alt">
            <?php } else { ?>
            <tr>
            <?php }?>
            	<td><?php echo ++$index; ?></td>
                <td>
                	<a target="_blank" title="Xem chi tiết" href="<?php echo rewrite_team_id($team['id']); ?>"><?php echo $team['product']; ?></a>
                
                </td>
                <td><?php echo formatMoney($team['team_price']); ?></td>
                <td><?php echo $order['number']; ?></td>
                <td style="text-align:right"><?php echo formatMoney($order['number']*$team['team_price']); ?></td>
            </tr>
            <?php }}?>
           
        </tbody>
	</table>
    <table width="96%" class="coupons-table" style="line-height:22px;">
        <tbody>
            <tr class="forum_title_tr"><th colspan="2" width="50%"><b>Thông tin người nhận</b></th><th colspan="2">Thông tin đơn hàng</th></tr>
            <tr>
            	<td width="15%"><b>Họ tên</b></td><td><?php echo $order['name']; ?></td>
                <td width="20%"><b>Mã đơn hàng</b></td><td><?php echo $order['id']; ?></td>
            </tr>
            <tr class="alt">
            	<td width="15%"><b>Địa chỉ</b></td>
                <td><?php echo $order['address'].', '.getRecord('vncountry',$order['quan'],'name').', '.getRecord('vncountry',$order['tp'],'name'); ?></td>
                <td width="20%"><b>Ngày đặt</b></td><td><?php echo date('d/m/Y H:i',$order['create_time']); ?></td>
            </tr>
            <tr>
            	<td width="15%"><b>Điện thoại</b></td><td><strong><?php echo $order['mobile']; ?></strong></td>
                <td width="20%"><b>Tình trạng</b></td><td><strong><?php echo $option_delivery[$order['ship_state']]; ?></strong></td>
           	</tr>
            <tr class="alt">
            	<td width="15%"><b>Lời nhắn</b></td><td><strong><?php echo $order['note']; ?></strong></td>
                <td width="20%"><b>Email</b></td><td><?php echo $order['email']; ?></td>
         	</tr>
        </tbody>
    </table>
	</div>
</div>
