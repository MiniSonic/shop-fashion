<?php include template("html_header");?>
<?php include template("block_popup_gopy");?> 
<?php include template("block_popup_forgotpass");?>
<?php include template("block_popup_register");?>
</div>
<div id="divMain">

    <!--header-->

    <div id="divHeader">

        <div class="divLogo">

            <span><a href="/" title="<?php echo $INI['system']['sitetitle']; ?>" class="logo"></a></span>

        </div>
        <div class="chontp">
                    	<div class="namecity"><?php echo $city['name']; ?></div>
                        
                        <?php if(count($hotcities)>1){?>
                        <div class="city_item_list">
                        <?php if(is_array($hotcities)){foreach($hotcities AS $hotciti) { ?>
                            <div class="item">
                                <a href="/city.php?ename=<?php echo $hotciti['ename']; ?>"><?php echo $hotciti['name']; ?></a>
                            </div>
                        <?php }}?>   
                        </div>
                        <?php }?>
                   	</div>
        <div id="divCamket">
        	<div class="item">
            	<span class="mienphigiaohang"></span>
                <span class="strong">giao hàng<br />Toàn quốc(*)</span>
            </div>
        	<div class="item">
            	<span class="trahang14"></span>
                <span class="strong">trả hàng<br />trong 14 ngày</span>
            </div>
        	<div class="item">
            	<span class="nhantien"></span>
                <span class="strong">thanh toán<br />khi nhận hàng</span>
            </div>
        </div>
        

    </div>

    <div class="clear"></div>

    <!--End header-->

    <!--Nav menu-->

    <div id="navMenu">
		
        <div class="navbar">

            <ul>
         
                <li>
<a href="#" class="first"><img src="/img/list.png" style="margin-left:-20px">&nbsp;&nbsp;Danh mục sản phẩm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<span class="nav-separate"></span>			
				</li>
			<li>
			<div class="autosearch">
	<form id="searchbox" action="/Tim-kiem">
    <input id="zipsearch" type="text" name="sk" placeholder="Tìm thử một Deal bạn thích...">
    <input id="submit" type="submit" value="Tìm">
	</form>
	</div>
			</li>
			<li class="account">
			
			
				
                </li>
			<li>
			
			</li>
            </ul>

        </div>

        <div class="blank-wrap"></div>

        <div class="clear"></div>

    </div>

    <div class="clear"></div>

    <!--End Nav menu-->

    <div id="divContent">