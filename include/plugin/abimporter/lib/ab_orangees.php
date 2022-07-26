<?php
/********************************************************************************
DO NOT EDIT THIS FILE!

Orangemail.es contacts importer

You may not reprint or redistribute this code without permission from Lunarsys Solutions.

Copyright 2009 Lunarsys Solutions. All Rights Reserved
WWW: http://www.lunarsys.com
********************************************************************************/
//include_once(dirname(__FILE__).'/abimporter.php');
if (!defined('__ABI')) die('Please include abi.php to use this importer!');

global $_OZ_SERVICES;
$_OZ_SERVICES['orangees'] = array('type'=>'abi', 'label'=>'Orange.es', 'class'=>'OrangeEsImporter');

define('OrangeEsImporter_CONTACT_REGEX',"/<contact[^>]*>(.*?)<\/contact\\s*>/ims");
define('OrangeEsImporter_NAME_REGEX',"/<name[^>]*>(.*?)<\/name\\s*>/ims");
define('OrangeEsImporter_EMAIL_REGEX',"/<email[^>]*>(.*?)<\/email\\s*>/ims");

/////////////////////////////////////////////////////////////////////////////////////////
//OrangeEsImporter
/////////////////////////////////////////////////////////////////////////////////////////
//@api
class OrangeEsImporter extends WebRequestor {
 
	//@api
	function fetchContacts ($loginemail, $password) {

		//Remove suffix
		$loginemail = preg_replace("/^(.*?)(\.orangees)$/ims", '${1}', $loginemail);
	 
	 	$parts = $this->getEmailParts ($loginemail);
	 	$login = $parts[0];
	 	$domain = $parts[1];

		$form = new HttpForm;
		$action = "";
		if ("amena.com"==$domain) {
			$action = "https://registrate.orange.es/auth/mail";
		} else if ("orangemail.es"==$domain) {
			$action = "http://web.orangemail.es/LoginWanadoo";
			$form->setField("usuario", $login);
		} else {
			$action = "http://web.orangemail.es/LoginWanadoo";
			$form->setField("usuario", $login);
		}
		$form->addField("user", $login);
		$form->addField("dominio", $domain);
		$form->addField("pwd", $password);
		$form->addField("url", "http://webm.orange.es/");
		$form->addField("form", "2");
		$form->addField("02.x", "36");
		$form->addField("02.y", "12");
		$form->addField("_authtrkcde", "{#TRKCDE#}");
        $postData = $form->buildPostData();
    	$html = $this->httpPost($action, $postData);
		if (strpos($this->lastUrl,'?error')!==false || strpos($html,'class="error"')!==false) {
		 	$this->close();
			return abi_set_error(_ABI_AUTHENTICATION_FAILED,'Bad user name or password');
		}

		//Export contacts
		$cl = array();
		$html = $this->httpGet("http://web.orangemail.es/addressBookMgr?cmd=getContacts");
        preg_match_all(OrangeEsImporter_CONTACT_REGEX, $html, $matches, PREG_SET_ORDER);
		foreach ($matches as $val) {
		 	$chtml = $val[1];
		 	$name = null;
	        if (preg_match(OrangeEsImporter_NAME_REGEX,$chtml,$matches2)!=0) $name = htmlentities2utf8($matches2[1]);
		 	$email = null;
	        if (preg_match(OrangeEsImporter_EMAIL_REGEX,$chtml,$matches2)!=0) $email = htmlentities2utf8($matches2[1]);
        	if (abi_valid_email($email)) {
				$cl[] = new Contact($name,$email);
			}
		}
		
		return $cl;		
	}
		

}

//orangemail.es (release date: 15 June 2008)
global $_DOMAIN_IMPORTERS;
$_DOMAIN_IMPORTERS["orange.es"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["wanadoo.es"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["orangemail.es"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["amena.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["wanadooadsl.net"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["eresmas.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["eresmas.net"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["orangecorreo.es"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["ctv.es"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["jet.es"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["telepolis.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["rincondelvago.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["paisdelocos.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["autocity.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["oniric.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["segundosfuera.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["ritmic.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["comunae.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["acierta.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["mifuturo.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["zonareservada.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["demasiado.com"] = 'OrangeEsImporter';
$_DOMAIN_IMPORTERS["spainstay.com"] = 'OrangeEsImporter';

?>
