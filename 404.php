<?php
session_start();
require_once "php-sdk/src/facebook.php";
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); 
?> 
<style>
.entry-content, .entry-summary {padding: 0 0 0;margin-top:-10px;margin-left:1px !important;}
.showTime {
	text-align: center !important;
font-family: customFont3 !important;
font-size: 26px;
margin-top: -18px !important;
margin-bottom: 0px;
color: #7D181C !important;
line-height: 24px;
}
div.description {
border-radius: 4px;
border: 1px dotted #bcbcbc;
background-image: url(http://taprootalaska.com/wTrans.png);
}
div.description, .container {
position: relative;
width: 101%;
margin-top: 10px !important;
margin-right: 0px !important;
margin-bottom: 0 !important;
margin-left: -8px !important;
padding-top: 4px !important;
padding-right: 0px !important;
padding-bottom: 4px !important;
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $referUrl2 = $_SERVER['REQUEST_URI'];
$search2  = array("/", "-","music", "events", "calendar"," ","product","&prime;");
$replace2 = array('', ' ', '','','','%20','','');
$calTitle2 = str_replace($search2, $replace2, $referUrl2);
?>
<?php
date_default_timezone_set('America/Anchorage');
$json_url = 'https://www.googleapis.com/calendar/v3/calendars/taprootalaska.com_61pgaa7um9n35hdt3fd8ekfbgg@group.calendar.google.com/events/?key=AIzaSyDgVGS4ExQ1DTdiugvYdLf3BdRQplzcejc&q='.$calTitle2.'&timeMin='.date('Y').'-'.date('m').'-'.date('d').'T00:00:00-08:00&singleEvents=True&maxResults=1';
$jso = file_get_contents($json_url);
$search  = array(':00-08:00');
$replace = array(' ');
$json = str_replace($search, $replace, $jso);
$links = json_decode($json, TRUE);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $calTitle; ?></title>
</head>

<body>
<div class="content-wrapper" style="width:1100px;position:relative;left:50%;margin-left:-555px;background-color:#333 !important;z-index:1;margin-top:-26px;">
<div class="left-bleed" style="float:left;"></div>
<div class="right-bleed" style="float:right;"></div>
<div class="menuSide" style="float:left;">
<img src="/wp-content/themes/twentyeleven/logo.png">
<header id="branding" role="banner">
<nav id="topNav" role="navigation" style="text-align:center;">
	  <h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
	  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
	  <div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
	  <div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
	  <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
	  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- #access -->
    <?php ad1() ?>
    <?php get_sidebar(); ?>
	</header><!-- #branding --></div>
<div class="main" style="float:right;">
<div style="background-image: url(<?php get_bloginfo();?>/wp-content/uploads/decoSmallLong.png) !important;
	background-position: center bottom !important;
	background-repeat: no-repeat !important; margin-top:10px;margin-bottom:12px;margin-left:4px !important;" class="">
		<h1 style="width:100% !important; text-align:center;padding-bottom:4px; font-family: 'customFont'; text-transform:uppercase; font-weight:bold; letter-spacing:-1px;">ALASKA'S EPICENTER FOR ARTS, ENTERTAINMENT AND GREAT FOOD</h1>
	</div> 
	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
            <?php
			foreach($links['items'] as $key=>$val){ 
			$gDesc = $val['description'];
			$eid = $val['location'];
			?>
					<h1 class="entry-title"><?php echo $val['summary']; ?></h1>
                    
				</header>

				<div class="entry-content">
                
    
	<?php   
	$break = "T";
$searcharray  = array($val['start']['dateTime']);
foreach ( $searcharray as $value ) {
    $tStamp = strtotime(strstr($value, $break, true));
}
	$referUrl3 = $val['start']['dateTime'];
	$search3  = array(date('Y'),'2011','-01-','-02-','-03-','-04-','-05-','-06-','-07-','-08-','-09-','-10-','-11-','-12-','T','13:','14:','15:','16:','17:','18:','19:','20:','21:','22:','23:','00:');
	$replace3 = array('','','January ','February ','March ','April ','May ','June ','July ','August ','September ','October ','November ','December ',', '.date('Y').' ','1:','2:','3:','4:','5:','6:','7:','8:','9:','10:','11:','12:');
	$dateResult = str_replace($search3, $replace3, $referUrl3);
?>					<p class="showTime" style="margin-bottom:-25px !important;">• <?php echo date('l', $tStamp).' '.$dateResult ?>pm •</p> <br/><br/>
<div class="description" style="margin-left:-1px !important;">
<?php if ($val['location'] < "1") { ?>
					<p><?php echo $val['description']; ?></p><br/>
					<p style="text-align:center;margin-bottom: 25px;">
					<?php
					
				if ($gDesc > '1') {
					 echo 'Ticketed events will be on sale no later than two weeks before the event, in most cases.'; }
			    else { echo 'This event HAS BEEN CONFIRMED and we will have a landing page up shortly.'; }
					 
					 ?>               </p>
                    
	   </div>
                    
<?php
			}
	else {
		$config = array(

    "appId" => '247263415391893',

    "secret" => '61fd70a3495116cb276d0c03a6e61b25');

 

$fb = new Facebook($config);



$user = $fb->getUser();







$page_id2 = '201396913237701';

$page_id3 = '30618';

$post_id2 = get_the_ID();


$cover = get_post_meta($post_id2, 'cover', 'true');

$genre = get_post_meta($post_id2, 'genre', 'true');

$beforeAbout = get_post_meta($post_id2, 'beforeAbout', 'true');

$website = get_post_meta($post_id2, 'website', 'true');

$about_me = get_post_meta($post_id2, 'about', 'true');

$hometown = get_post_meta($post_id2, 'hometown', 'true');

$influences = get_post_meta($post_id2, 'influences', 'true');

$ticketDesc = get_post_meta($post_id2, 'ticketDesc', 'true');
$ticketPrice = get_post_meta($post_id2, 'ticketPrice', 'true');

date_default_timezone_set('America/Anchorage');

             $facebook2 = new Facebook($config);



    $fql2 = 'SELECT 

                name, 

                pic_big, 

                creator,

                start_time,

                end_time,

				description,
				
				ticket_uri

            FROM event 

            WHERE eid = '.$eid.'

    ';



    $ret_obj2 = $facebook2->api(array(

        'method' => 'fql.query',

        'query' => $fql2,

    ));

    $html2 = '';                            

    foreach($ret_obj2 as $key2)

    {
		$lessThan = "1";

		$phrase2  = $key2['name'];

		$healthy2 = array(" ");

		$yummy2   = array("-");

		$newphrase2 = str_replace($healthy2, $yummy2, $phrase2);

        $facebook_url2 = 'http://taprootalaska.com/';

		$theTime = get_the_time('l, F jS, Y');

 		$theTime2 = get_the_time('g:i a');
		
       $start_time1 = date('M j, Y \a\t g:i A', $key2['start_time']);

        $end_time1 = date('M j, Y \a\t g:i A', $key2['end_time']);

		$ticketLink = 'http://taprootalaska.com/product/'.$val['summary'];


if ($ticketLink > $lessThan) {
        $html2 .= '

            <div class="container">

                   

                     <div class="">

					 <div class="starM"><div class="starT"><div style="min-height:300px;" class="starB">

					 <div class="image" style="float:right;">
					<form style="padding-left:20px !important;margin-left:10px;" action="'.$ticketLink.'" method="post" name="BB_BuyButtonForm" target="_blank">
	    <input name="item_name_1" type="hidden" value="'.$ticketLink.'"style="position:absolute;"/>
    <input name="item_description_1" type="hidden" value="General Admission to '.$ticketLink .' at Tap Root '. $theTime.' at '.$theTime2.' Your name will be at the door on the night of the event." style="position:absolute;"/>
    <input name="item_price_1" type="hidden" value="'.$ticketPrice.'" style="position:absolute;"/>
    <input name="item_currency_1" type="hidden" value="USD" style="position:absolute;"/>
    <input name="_charset_" type="hidden" value="utf-8" style="position:absolute;"/>
	

					 <img src="'.$key2['pic_big'].'"  width="200" style="border-radius:3px;" /><br/><a href="http://www.facebook.com/events/'.$eid.'/" target="_blank"><img style="border:0px !important;margin-top:0px;margin-bottom:10px;margin-left:7px;" title="I am Attending" src="http://taprootalaska.com/wp-content/uploads/2012/06/Untitled-1.jpg" alt=""  /></a>
					<br/></div>
</form>
					   <span class="txt">

						<p style="margin-top: -16px;">'.$val['description'].'</p>

						</div></span></div></div></div>

			</div>
            </div>

        ';
}
else {
	 $html2 .= '

            <div class="container">

                   

                     <div class="description">

					 <div class="starM"><div class="starT"><div style="min-height:300px;" class="starB">

					 <div class="image">
			
					 <img src="'.$key2['pic_big'].'"  width="200" /><br/><a href="http://www.facebook.com/events/'.$eid.'/" target="_blank"><img style="border:0px !important;margin-top:10px;margin-bottom:10px;" title="I am Attending" src="http://taprootalaska.com/wp-content/uploads/2012/06/Untitled-1.jpg" alt=""  /></a></div>

					   <span class="txt">
						<p style="margin-top: -16px;">'.$val['description'].'</p>


						</div></span></div></div></div>

			</div>
            </div>

        ';
}

    }



    echo $html2;


}



    }
?>
                     <div style="background-image: url(<?php get_bloginfo();?>/wp-content/uploads/decoSmall.png) !important;
	background-position: center bottom !important;
	background-repeat: no-repeat !important; margin-top:20px;margin-bottom:4px;margin-left:4px !important;" class="">
    
		<h1 style="width:100% !important; text-align:center;padding-bottom:2px; font-family: 'customFont'; text-transform:uppercase; font-weight:bold; letter-spacing:-1px;">Upcoming Shows at the Tap Root</h1>
	</div>	         
  <div style="margin-left:11px;min-height: 750px;"><?php fb_events2() ?><br/><br/></div>


<div style="background-image: url(<?php get_bloginfo();?>/wp-content/uploads/decoSmall.png) !important; 
	background-position: center top !important;
	background-repeat: no-repeat !important; margin-top:40px;margin-bottom:4px;margin-left:4px !important;" class="">
		<h1 style="width:100% !important; text-align:center;padding-top:6px; font-family: 'customFont'; text-transform:uppercase; font-weight:bold; letter-spacing:-1px;">Get Rooted in Spenard!</h1>
	</div>	
					
				
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
      
	</div><!-- #primary -->
            </div>
</div>
<?php get_footer(); ?>
</body>
</html>

		