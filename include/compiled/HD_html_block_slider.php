<?php 
    $slideteams = DB::LimitQuery('adsense', array(
        	'condition' => array('display'=>'Y', 'pos_ads'=>'bannertop'),
            'order' => 'ORDER BY order_sort ASC, id DESC',
        ));
; ?>

<div class="best_of_best_deal">
    <div style="width: 760px; height: 320px; overflow: hidden;" class="bob_content" id="slider">
        <ul>
        	<?php if(is_array($slideteams)){foreach($slideteams AS $one) { ?>
            <!--List style 5 item-->
            <li style="float: left;" class="lislider">
                <div class="dealItem">
                <a href="<?php echo $one['url']; ?>" target="_blank" title="<?php echo $one['name']; ?>">
        <img alt="<?php echo $one['name']; ?>" src="<?php echo team_image($one['image']); ?>" width="760" height="320px"/>
    </a>
                </div>
            </li>
            <!--End List style 5 item-->
            <?php }}?>
        </ul>
    </div> 
    <script type="text/javascript">
        $(function () {
            $("#slider").easySlider({ auto: true, continuous: true, pause: 4000, speed: 500,
                prevId: 'bob_prev',
                prevText: '',
                nextId: 'bob_next',
                nextText: ''
            });
        });
    </script>
</div>