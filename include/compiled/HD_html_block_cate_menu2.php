<?php 
	$rcate = DB::LimitQuery('cate', array(
    	'condition' => array('cate_type'=>'deal', 'type'=>'root', 'display'=>'Y'),
        'order' => 'ORDER BY sort_order ASC',
    ));
    $count_cate = count($cate);
; ?>
<!--Danh muc san pham-->
<div class="category divProductCategoryBox">
    <div class="cate-content">
    	<?php if(is_array($rcate)){foreach($rcate AS $index=>$one) { ?>
		<div class="cate-item">
        	<div class="parrent">
            	<img src="/static/<?php echo $one['image_cate']; ?>" width="16" height="16" />
                <a class="athd" href="<?php echo rewrite_cate_shop($one['id']); ?>" title="<?php echo $one['name']; ?>"><?php echo $one['name']; ?><span class="deal_count">(<?php echo count_team_cate($one['id']); ?>)</span></a>
                <?php 
                    $ccate = DB::LimitQuery('cate', array(
                        'condition' => array(
                            'cate_type'=>'deal', 
                            'type'=>'child', 
                            'display'=>'Y', 
                            'pid' => $one['id']
                        ),
                        'order' => 'ORDER BY sort_order ASC',
                    ));
                    $count_ccate = count($ccate);
                ; ?>
        	</div>
                <?php if(!empty($ccate)){?>
                <?php if($count_ccate >= 3){?>
                	<!--{if}-->
                    <dd class="sub-cate-list" style="top:<?php echo $index*-26; ?>px; width:380px;">
                <?php } else { ?>
                <dd class="sub-cate-list" style="top:<?php echo $index*-26; ?>px;">
                <?php }?>
                	<?php if(is_array($ccate)){foreach($ccate AS $index1=>$one1) { ?>
                    <?php if($index1%2 == 0 ){?>
                	<div class="box-column">
                    <?php }?>
                    	<dl>
                        	<dt><a href="<?php echo rewrite_cate_shop($one1['id']); ?>" title="<?php echo $one1['name']; ?>"><?php echo $one1['name']; ?></a></dt>
                            <?php 
                                $sccate = DB::LimitQuery('cate', array(
                                    'condition' => array(
                                        'cate_type'=>'deal', 
                                        'type'=>'subchild', 
                                        'display'=>'Y', 
                                        'pid' => $one1['id']
                                    ),
                                    'order' => 'ORDER BY sort_order ASC',
                                ));
                            ; ?>
                        	<dd>
                            	<?php if(is_array($sccate)){foreach($sccate AS $index2=>$one2) { ?>
                            	<a href="<?php echo rewrite_cate_shop($one2['id']); ?>" title="<?php echo $one2['name']; ?>"><?php echo $one2['name']; ?></a>
                                <?php }}?>
                      		</dd>
                        </dl>
                    <?php if($index1%2 != 0 ){?>
                	</div>
                    <?php }?>
                    <?php }}?>
                    <?php if(end($ccate)=='FALSE'){?>
                    </div>
                    <?php }?>
                </dd>
                <?php }?>
     	</div>
        <div class="clear"></div>
        <?php }}?>
    </div>
</div>
<!--End Danh muc-->
<div class="clear"></div>
