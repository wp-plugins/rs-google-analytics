<?php
/**
 * Represents the view for the public-facing component of the plugin.
 *
 * This typically includes any information, if any, that is rendered to the
 * frontend of the theme when the plugin is activated.
 *
 */
// This file is used to markup the public facing aspect of the plugin.
$code = $myCode->getCode();
foreach ($code as $key => $value) {
	$location 	= $value->rsgoogleanalytics_location;
	$code 		= $value->rsgoogleanalytics_code;
}
switch($location){
	case 'header':
		$hook = "wp_head";
	break;
	case 'footer':
		$hook = "wp_footer";
	break;
}
add_action($hook, 'outputCode');
function outputCode(){
	$code = '<script>';
	$code .= '//<![CDATA[';
	$code .= 'var _gaq = _gaq || [];';
	$code .= '_gaq.push(["_setAccount", "UA-'.$code.'"]);';
	$code .= '_gaq.push(["_trackPageview"]);';
	$code .= '(function () {';
	$code .= 'var ga = document.createElement("script");';
	$code .= 'ga.type = "text/javascript";';
	$code .= 'ga.async = true;';
	$code .= 'ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";';
	$code .= 'var s = document.getElementsByTagName("script")[0];';
	$code .= 's.parentNode.insertBefore(ga, s);';
	$code .= '})();';
	$code .= '//]]>';
	$code .= '</script>';
	echo $code;
}
?>
