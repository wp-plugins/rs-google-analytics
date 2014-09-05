<?php

class myCode {

	// protected static $myHook = '';

	public function __construct() {
		global $wpdb;
		$this->db = $wpdb;
		$this->table = $wpdb->prefix."rs_google_analytics";
	}

	public function initPlugin(){
		$myCodeDetails = $this->getCode();
		$this->myCode = $myCodeDetails[0]->rsgoogleanalytics_code;
		$this->myHook = $myCodeDetails[0]->rsgoogleanalytics_location;

		add_action("wp_".$this->myHook, array($this,'outputCode'));
	}

	public function outputCode(){
		$code = '<script>';
		$code .= '(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){';
		$code .= '(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),';
		$code .= 'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)';
		$code .= '})(window,document,"script","//www.google-analytics.com/analytics.js","ga");';
		$code .= 'ga("create", "UA-'.$this->myCode.'", "auto");';
		$code .= 'ga("send", "pageview");';
		$code .= '</script>';
		echo $code;
	}

	public function getCode(){
		global $wpdb;
		$result = $wpdb->get_results("SELECT * FROM ".$this->table." LIMIT 1");
		return $result;
	}

	public function addCode($code = "", $location = ""){
		global $wpdb;
		// First lets truncate the table
		$truncate = $wpdb->get_results("TRUNCATE ".$this->table);
		$result = $wpdb->get_results("INSERT INTO ".$this->table." (rsgoogleanalytics_code,rsgoogleanalytics_location)VALUES('$code','$location')");
		return array("code"=>"added");
	}

}