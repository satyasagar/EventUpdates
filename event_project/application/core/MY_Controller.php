<?php

class MY_Controller extends CI_Controller{

	function __construct() {

		parent::__construct();

		$this->load->database();
		date_default_timezone_set('Asia/Karachi');

	}

	

	public function get_view($view_path="",$data=""){

		$c_lang = "en";

		$c_theme = "default";

		$this->load->view($c_lang . "/" . $c_theme . "/www/header");

		$this->load->view($c_lang . "/" . $c_theme .  "/www/" . $view_path,$data);

		$this->load->view($c_lang . "/" . $c_theme .  "/www/footer");

	}



	public function get_admin_view($view_path="",$data=""){

		$c_lang = "en";

		$c_theme = "default";

		$this->load->view($c_lang . "/" . $c_theme . "/admin/header");

		$this->load->view($c_lang . "/" . $c_theme .  "/admin/" . $view_path,$data);

		$this->load->view($c_lang . "/" . $c_theme .  "/admin/footer");

	}



	public function print_b($arr){

		echo "<pre>";

		print_r($arr);

		echo "</pre>";

	}



	public function gcurrency($vl){

		return "&pound;" . $vl;

	}

	

	public function genRNum($tblName="",$colName="",$dCount=0){

		$cNext = 1;

		while($cNext==1){

			$rStr = random_string('alnum',$dCount);

			$this->db->select($colName);

			$this->db->where($colName,$rStr);

			$rs_rnd = $this->db->get($tblName);

			if($rs_rnd->num_rows()==0) {

				$cNext=0;	

				return $rStr;

			}

		}

	}



	

}

?>