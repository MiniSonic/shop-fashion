<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv=content-type content="text/html; charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=9" />

	<?php if(!$pagetitle||$request_uri=='index'){?>

	<title><?php echo $INI['system']['abbreviation']; ?> - <?php echo $INI['system']['sitename']; ?></title>

	<?php } else if($team) { ?>

	<title><?php echo $pagetitle; ?></title>

	<?php } else { ?>

	<title><?php echo $pagetitle; ?></title>

	<?php }?>



	<?php if(!$pagetitle||$request_uri=='index'){?>

	<meta name="description" content="<?php echo $INI['system']['sitetitle']; ?> - <?php echo $kwseo; ?>" />
	<?php } else { ?>
	<meta name="description" content="<?php echo $seo_description?$seo_description:$team['title']; ?>" />
	

	<?php }?>
	
	<?php if(!$pagetitle||$request_uri=='index'){?>
	<meta name="keywords" content="<?php echo $kwseo; ?>" />

    <meta content="all" name="robots">

    <meta name="robots" content="all, index, follow"><meta name="googlebot" content="all, index, follow">
	

	<?php } else { ?>

	<meta name="keywords" content="<?php echo $seo_keyword; ?>" />

    <meta content="all" name="robots">

    <meta name="robots" content="all, index, follow"><meta name="googlebot" content="all, index, follow">

	<?php }?>

	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta name="google-site-verification" content="zv3WZNz1Q-j9K9AIGeryxTJl2qkq2piO5O0tfELvCPY" />
	<link href="<?php echo $INI['system']['wwwprefix']; ?>/feed.php?ename=<?php echo $city['ename']; ?>" rel="alternate" title="subscription update" type="application/rss+xml" />

	<link rel="shortcut icon" href="/static/icon/favicon.ico" />

    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/general.css" type="text/css" media="screen" charset="utf-8" />

    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/paper.css" type="text/css" media="screen" charset="utf-8" />

	<script type="text/javascript">var WEB_ROOT = '<?php echo WEB_ROOT; ?>'; var DOMAIN_ROOT = 'http://localhost<?php echo WEB_ROOT; ?>';</script>

	<script type="text/javascript">var LOGINUID = <?php echo abs(intval($login_user_id)); ?>;</script>

	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/general.js" type="text/javascript"></script>

	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/reg.js" type="text/javascript"></script>

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/jquery.jcarousel.min.js" type="text/javascript"></script>

    <?php if($page_type=='home'){?>

    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/home.css" type="text/css" media="screen" charset="utf-8" />

	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/home.js" type="text/javascript"></script>

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/jcookie.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='article'){?>

    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/article.css" type="text/css" media="screen" charset="utf-8" />

    <?php }?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/reg.css" type="text/css" media="screen" charset="utf-8" />

    <?php if($page_type=='detail'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/shipping.css" type="text/css" media="screen" charset="utf-8" />

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/detail.css" type="text/css" media="screen" charset="utf-8" />

    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/nivo-slider.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/detail.js" type="text/javascript"></script>

	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/shipping.js" type="text/javascript"></script>

	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/jquery.nivo.slider.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='cart'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/giohang.css" type="text/css" media="screen" charset="utf-8" />

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/thanhtoantip.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/giohang.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='news'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/news.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/news.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='search'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/search.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/search.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='profile'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/profile.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/profile.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='wishlist'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/wishlist.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/wishlist.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='category'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/category.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/category.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='recent'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/recent.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/recent.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='checkout'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/checkout.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/checkout.js" type="text/javascript"></script>

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/checkout2.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='updatepass'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/updatepass.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/updatepass.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='order_success'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/tksman.css" type="text/css" media="screen" charset="utf-8" />

    <?php }?>

    <?php if($page_type=='myorder'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/myorder.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/myorder.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='mymoney'){?>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/mymoney.css" type="text/css" media="screen" charset="utf-8" />

    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/mymoney.js" type="text/javascript"></script>

    <?php }?>

    <?php if($page_type=='vmarket'){?>

	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/vmarket.js" type="text/javascript"></script>

	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/vmarket.css" type="text/css" media="screen" charset="utf-8" />

    <?php }?>
	
	<script type="text/javascript" src="/search/jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<script type="text/javascript"> 
 
		jQuery(document).ready(function(){
			jQuery('#zipsearch').autocomplete({source:'<?php echo $INI['system']['wwwprefix']; ?>/search/suggest_zip.php',
														minLength:2,
														select: function( event, ui ) { 
															window.location.href = ui.item.link;
														}
		});
		});
 
	</script> 
	<link rel="stylesheet" href="/search/jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45096495-1', 'cungre.vn');
  ga('send', 'pageview');

</script>
	<?php echo Session::Get('script',true);; ?>
</head>

<body>

    <!--Quảng cáo trái phải-->

    <?php if($INI['option']['ads_left_right']=='img'){?>

    <?php 

        $ads_bannerl = DB::LimitQuery('adsense', array(

            'condition' => array('display'=>'Y', 'pos_ads'=>'bannerl'),

            'order' => 'ORDER BY order_sort ASC, id DESC',

    	));

        $ads_bannerr = DB::LimitQuery('adsense', array(

            'condition' => array('display'=>'Y', 'pos_ads'=>'bannerr'),

            'order' => 'ORDER BY order_sort ASC, id DESC',

    	));

    ; ?>

    <div class="divAdsBanner divAdsLeft">

        <div style="cursor: pointer; float: left;" title="<?php echo $ads_bannerl['0']['name']; ?>">

            <a href="<?php echo $ads_bannerl['0']['image']; ?>" target="_blank">

                <img alt="<?php echo $INI['system']['keywordseo']; ?>" src="<?php echo team_image($ads_bannerl['0']['image']); ?>" width="131"/>

            </a>

        </div>

        <br style="clear: both;">

    </div>

    <div class="divAdsBanner divAdsRight">

        <div style="cursor: pointer; float: left;">

            <a href="<?php echo $ads_bannerr['0']['url']; ?>" target="_blank" title="<?php echo $ads_bannerr['0']['name']; ?>">

                <img alt="<?php echo $INI['system']['keywordseo']; ?>" src="<?php echo team_image($ads_bannerr['0']['image']); ?>" width="131" />

            </a>

        </div>

        <br style="clear: both;">

    </div>

    <!--{if $INI['option']['ads_left_right']=='item'}-->

    <?php } else { ?>

    <?php }?>

    <!--End Quảng cáo trái phải-->



    <!--Facebook connect-->

    

    <div id="fb-root"></div>

    <script>

        (function(d, s, id) {

              var js, fjs = d.getElementsByTagName(s)[0];

              if (d.getElementById(id)) return;

              js = d.createElement(s); js.id = id;

              js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";

              fjs.parentNode.insertBefore(js, fjs);

            }(document, 'script', 'facebook-jssdk'));

    </script>

    

    <!--End of Facebook connect-->