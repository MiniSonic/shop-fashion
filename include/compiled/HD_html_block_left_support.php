<div class="buttomBox">
    <div style="margin-top: 15px" id="divSupport" class="support">
        <div class="support-icon"></div>
        <div class="title">Hỗ trợ trực tuyến</div>
        <div class="clear"></div>
        <div class="support-content">
            <div style="overflow: hidden" id="divSupportValue">
                <div class="support-list">
                    <a title="NV Hỗ trợ 1" href="ymsgr:sendIM?<?php echo $INI['system']['ym1']; ?>">
                    	<img alt="" src="http://opi.yahoo.com/online?u=<?php echo $INI['system']['ym1']; ?>&amp;m=g&amp;t=0">&nbsp;NV Hỗ trợ 1</a>
                    <a title="NV Hỗ trợ 1" href="ymsgr:sendIM?<?php echo $INI['system']['ym2']; ?>">
                    	<img alt="" src="http://opi.yahoo.com/online?u=<?php echo $INI['system']['ym2']; ?>&amp;m=g&amp;t=0">&nbsp;NV Hỗ trợ 2</a>
                    <a title="NV Hỗ trợ 1" href="ymsgr:sendIM?<?php echo $INI['system']['ym3']; ?>">
                    	<img alt="" src="http://opi.yahoo.com/online?u=<?php echo $INI['system']['ym3']; ?>&amp;m=g&amp;t=0">&nbsp;NV Hỗ trợ 3</a>
                    <a title="NV Hỗ trợ 1" href="ymsgr:sendIM?<?php echo $INI['system']['ym4']; ?>">
                    	<img alt="" src="http://opi.yahoo.com/online?u=<?php echo $INI['system']['ym4']; ?>&amp;m=g&amp;t=0">&nbsp;NV Hỗ trợ 4</a>
                    <a class="skype" href="skype:<?php echo $INI['system']['sk1']; ?>?chat" title="Skype">
                    	<img border="0" src="<?php echo $template_path; ?>/sp_sky.png" title="Skype">&nbsp;H.trợ 1</a>
                    <a class="skype" href="skype:<?php echo $INI['system']['sk2']; ?>?chat" title="Skype">
                    	<img border="0" src="<?php echo $template_path; ?>/sp_sky.png" title="Skype">&nbsp;H.trợ 2</a>
                    <div class="clear"></div>
                </div>
                
                <div class="tong-dai"><span>CSKH: </span><span class="number boldGreen"><?php echo $INI['system']['cskh']; ?></span></div>
                <div class="clear"></div>
                
                <div class="tong-dai"><span>Hotline: </span><span class="number boldGreen"><?php echo $INI['system']['hotline']; ?></span></div>
                <div class="clear"></div>
                
            </div>
            <div class="clear"></div>
            <div class="thoi-gian-tong-dai"><?php echo $INI['system']['tgphucvu']; ?></div>
        </div>
        <div class="clear"></div>
        <div id="divSupportMore" style="margin-top: 10px"></div>
    </div>
    
    <div style="display: none;" id="divSupportTemp"></div>
    <?php 
    	$ads_lefts = DB::LimitQuery('adsense', array(
        	'condition' => array('display'=>'Y', 'pos_ads'=>'left'),
            'order' => 'ORDER BY order_sort ASC, id DESC',
			'size' => $INI['system']['adslitem'],
        ));
    ; ?>
    <?php if(is_array($ads_lefts)){foreach($ads_lefts AS $one) { ?>.
    <div style="padding-top: 0" class="divShowAds">
        <a target="_blank" title="<?php echo $one['name']; ?>" href="<?php echo $one['url']; ?>">
            <img width="230" title="<?php echo $one['name']; ?> ads by <?php echo $tenngan; ?>" alt="" src="<?php echo team_image($one['image']); ?>">
        </a>
    </div>
    <?php }}?>

</div>
