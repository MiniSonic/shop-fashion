<?php
//for rewrite or iis rewrite
if (isset($_SERVER['HTTP_X_ORIGINAL_URL'])) {
	$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_ORIGINAL_URL'];
} else if (isset($_SERVER['HTTP_X_REWRITE_URL'])) {
	$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_REWRITE_URL'];
}

require 'plugin/ckeditor/ckeditor.php';
require 'plugin/ckfinder/ckfinder.php';

error_reporting(E_ALL^E_WARNING^E_NOTICE);
define('SYS_VERSION', '1.0');
define('SYS_SUBVERSION', '1602');
define('SYS_TIMESTART', microtime(true));
define('SYS_REQUEST', isset($_SERVER['REQUEST_URI']));
define('DIR_SEPERATOR', strstr(strtoupper(PHP_OS), 'WIN')?'\\':'/');
define('DIR_ROOT', str_replace('\\','/',dirname(__FILE__)));
define('DIR_LIBARAY', DIR_ROOT . '/library');
define('DIR_CLASSES', DIR_ROOT . '/classes');
define('DIR_COMPILED', DIR_ROOT . '/compiled');
define('DIR_TEMPLATE', DIR_ROOT . '/template');
define('DIR_FUNCTION', DIR_ROOT . '/function');
define('DIR_CONFIGURE', DIR_ROOT . '/configure');
define('SYS_MAGICGPC', get_magic_quotes_gpc());
define('SYS_PHPFILE', DIR_ROOT . '/configure/system.php');
define('REG_PHPFILE', DIR_ROOT . '/configure/register.php');
define('WWW_ROOT', rtrim(dirname(DIR_ROOT),'/'));
define('IMG_ROOT', dirname(DIR_ROOT) . '/static');
define('LICENSE_LOOP','28');
define('DOMAIN_NAME','http://cungre.vn');

/* encoding */
mb_internal_encoding('UTF-8');
/* end */

/* important function */
function __autoload($class_name) {
	$file_name = trim(str_replace('_','/',$class_name),'/').'.class.php';
	$file_path = DIR_LIBARAY. '/' . $file_name;
	if ( file_exists( $file_path ) ) {
		return require_once( $file_path );
	}
	$file_path = DIR_CLASSES. '/' . $file_name;
	if ( file_exists( $file_path ) ) {
		return require_once( $file_path );
	}
	return false;
}

function import($funcpre) {
	$file_path = DIR_FUNCTION. '/' . $funcpre . '.php';
	if (file_exists($file_path) ) {
		require_once( $file_path );
	}
}
function getRecord($table,$id,$file){
	$files=Table::Fetch($table, $id);
	return $files[$file];

}
	// Chuyen doi tieng viet co dau sang khong dau
function ThietKeTrangChu_SEO($value){
               #---------------------------------a
               $value = str_replace("�", "a", $value);
               $value = str_replace("�", "a", $value);
               $value = str_replace("?", "a", $value);
               $value = str_replace("�", "a", $value);
               $value = str_replace("?", "a", $value);
               $value = str_replace("�", "a", $value);
               $value = str_replace("a", "a", $value);
               #---------------------------------A
               $value = str_replace("�", "A", $value);
               $value = str_replace("�", "A", $value);
               $value = str_replace("?", "A", $value);
               $value = str_replace("�", "A", $value);
               $value = str_replace("?", "A", $value);
               $value = str_replace("�", "A", $value);
               $value = str_replace("A", "A", $value);
               #---------------------------------a^
               $value = str_replace("?", "a", $value);
               $value = str_replace("?", "a", $value);
               $value = str_replace("?", "a", $value);
               $value = str_replace("?", "a", $value);
               $value = str_replace("?", "a", $value);
               #---------------------------------A^
               $value = str_replace("?", "A", $value);
               $value = str_replace("?", "A", $value);
               $value = str_replace("?", "A", $value);
               $value = str_replace("?", "A", $value);
               $value = str_replace("?", "A", $value);
               #---------------------------------a(
               $value = str_replace("?", "a", $value);
               $value = str_replace("?", "a", $value);
               $value = str_replace("?", "a", $value);
               $value = str_replace("?", "a", $value);
               $value = str_replace("?", "a", $value);
               #---------------------------------A(
               $value = str_replace("?", "A", $value);
               $value = str_replace("?", "A", $value);
               $value = str_replace("?", "A", $value);
               $value = str_replace("?", "A", $value);
               $value = str_replace("?", "A", $value);
               #---------------------------------e
               $value = str_replace("�", "e", $value);
               $value = str_replace("�", "e", $value);
               $value = str_replace("?", "e", $value);
               $value = str_replace("?", "e", $value);
               $value = str_replace("?", "e", $value);
               $value = str_replace("�", "e", $value);
               #---------------------------------E
               $value = str_replace("�", "E", $value);
               $value = str_replace("�", "E", $value);
               $value = str_replace("?", "E", $value);
               $value = str_replace("?", "E", $value);
               $value = str_replace("?", "E", $value);
               $value = str_replace("�", "E", $value);
               #---------------------------------e^
               $value = str_replace("?", "e", $value);
               $value = str_replace("?", "e", $value);
               $value = str_replace("?", "e", $value);
               $value = str_replace("?", "e", $value);
               $value = str_replace("?", "e", $value);
               #---------------------------------E^
               $value = str_replace("?", "E", $value);
               $value = str_replace("?", "E", $value);
               $value = str_replace("?", "E", $value);
               $value = str_replace("?", "E", $value);
               $value = str_replace("?", "E", $value);
               #---------------------------------i
               $value = str_replace("�", "i", $value);
               $value = str_replace("�", "i", $value);
               $value = str_replace("?", "i", $value);
               $value = str_replace("i", "i", $value);
               $value = str_replace("?", "i", $value);
               #---------------------------------I
               $value = str_replace("�", "I", $value);
               $value = str_replace("�", "I", $value);
               $value = str_replace("?", "I", $value);
               $value = str_replace("I", "I", $value);
               $value = str_replace("?", "I", $value);
               #---------------------------------o^
               $value = str_replace("?", "o", $value);
               $value = str_replace("?", "o", $value);
               $value = str_replace("?", "o", $value);
               $value = str_replace("?", "o", $value);
               $value = str_replace("?", "o", $value);
               #---------------------------------O^
               $value = str_replace("?", "O", $value);
               $value = str_replace("?", "O", $value);
               $value = str_replace("?", "O", $value);
               $value = str_replace("�", "O", $value);
               $value = str_replace("?", "O", $value);
               #---------------------------------o*
               $value = str_replace("?", "o", $value);
               $value = str_replace("?", "o", $value);
               $value = str_replace("?", "o", $value);
               $value = str_replace("?", "o", $value);
               $value = str_replace("?", "o", $value);
               #---------------------------------O*
               $value = str_replace("?", "O", $value);
               $value = str_replace("?", "O", $value);
               $value = str_replace("?", "O", $value);
               $value = str_replace("?", "O", $value);
               $value = str_replace("?", "O", $value);
               #---------------------------------u*
               $value = str_replace("?", "u", $value);
               $value = str_replace("?", "u", $value);
               $value = str_replace("?", "u", $value);
               $value = str_replace("?", "u", $value);
               $value = str_replace("?", "u", $value);
               #---------------------------------U*
               $value = str_replace("?", "U", $value);
               $value = str_replace("?", "U", $value);
               $value = str_replace("?", "U", $value);
               $value = str_replace("?", "U", $value);
               $value = str_replace("?", "U", $value);
               #---------------------------------y
               $value = str_replace("�", "y", $value);
               $value = str_replace("?", "y", $value);
               $value = str_replace("?", "y", $value);
               $value = str_replace("?", "y", $value);
               $value = str_replace("?", "y", $value);
               #---------------------------------Y
               $value = str_replace("�", "Y", $value);
               $value = str_replace("?", "Y", $value);
               $value = str_replace("?", "Y", $value);
               $value = str_replace("?", "Y", $value);
               $value = str_replace("?", "Y", $value);
               #---------------------------------DD
               $value = str_replace("�", "D", $value);
               $value = str_replace("�", "D", $value);
               $value = str_replace("d", "d", $value);
               #---------------------------------o
               $value = str_replace("�", "o", $value);
               $value = str_replace("�", "o", $value);
               $value = str_replace("?", "o", $value);
               $value = str_replace("�", "o", $value);
               $value = str_replace("?", "o", $value);
               $value = str_replace("�", "o", $value);
               $value = str_replace("o", "o", $value);
               #---------------------------------O
               $value = str_replace("�", "O", $value);
               $value = str_replace("�", "O", $value);
               $value = str_replace("?", "O", $value);
               $value = str_replace("�", "O", $value);
               $value = str_replace("?", "O", $value);
               $value = str_replace("�", "O", $value);
               $value = str_replace("O", "O", $value);
               #---------------------------------u
               $value = str_replace("�", "u", $value);
               $value = str_replace("�", "u", $value);
               $value = str_replace("?", "u", $value);
               $value = str_replace("u", "u", $value);
               $value = str_replace("?", "u", $value);
               $value = str_replace("u", "u", $value);
               #---------------------------------U
               $value = str_replace("�", "U", $value);
               $value = str_replace("�", "U", $value);
               $value = str_replace("?", "U", $value);
               $value = str_replace("U", "U", $value);
               $value = str_replace("?", "U", $value);
               $value = str_replace("U", "U", $value);
               #---------------------------------
			   $value = str_replace("%"," phan tram ", $value);
			   $value = str_replace("&"," ", $value);
			   $value = str_replace(""," ", $value);
			   $value = str_replace("/"," ", $value);
               $value = str_replace("."," ", $value);
               $value = str_replace(","," ", $value);
               $value = str_replace("!"," ", $value);
               $value = str_replace("?"," ", $value);
               $value = str_replace(":", " ", $value);
               $value = str_replace("'", " ", $value);
               $value = str_replace("&#039;", " ", $value);
               $value = str_replace("&quot;", " ", $value);
			   $value = str_replace("\"\"", " ", $value);
               $value = str_replace("&amp;","va", $value);
               $value = str_replace("(", " ", $value);
			   $value = str_replace(";", " ", $value);
               $value = str_replace(")", " ", $value);
               $value = str_replace("-", " ", $value);
			   $value = str_replace("&amp;-&amp;", "-", $value);
               $value = str_replace("   ", " ", $value);
               $value = str_replace("  ", " ", $value);
              //return str_replace(" ","-",trim($value));
			  return strtolower(str_replace(" ","-",trim($value)));
      }
$tracking = array(
			'0'=>'Mới đặt',
			'1'=>'Đã xác nhận',
			'2'=>'Đang giao',
			'3'=>'Đã giao',
			'4'=>'Đã hủy'
			);	  
/* json */
if (!function_exists('json_encode')){function json_encode($v){$js = new JsonService(); return $js->encode($v);}}
if (!function_exists('json_decode')){function json_decode($v,$t){$js = new JsonService($t?16:0); return $js->decode($v);}}
/* end json */

/* date_zone */
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(function_exists('date_default_timezone_set')) { date_default_timezone_set('Asia/Ho_Chi_Minh'); }
/* end date_zone */

/* import */
import('template');
import('common');

/* ob_handler */
if(SYS_REQUEST){ ob_get_clean(); ob_start(); }
/* end ob */

