<?php

class myCode {

	public function __construct() {
		global $wpdb;
		$this->db = $wpdb;
		$this->table = $wpdb->prefix."rs_google_analytics";
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