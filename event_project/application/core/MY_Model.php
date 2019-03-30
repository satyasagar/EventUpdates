<?php

class MY_Model extends CI_Model  {



public $col_list="*";

public $tbl_name="";

public $validation_arr="";



public $c_lang = "en";



	function __construct($tbl_name="") {

		parent::__construct();

		$this->load->database();

		$this->tbl_name = $tbl_name;
		date_default_timezone_set('Asia/Karachi');
		

	}



	public function get_view_string($view_path="",$data=""){

		$c_lang = "en";

		$c_theme = "default";

		$this->load->library("parser");

		return $this->parser->parse($c_lang . "/" . $c_theme .  "/www/" . $view_path,$data,TRUE);

	}



	public function send_email($email_array){



		$config = Array(

		    'protocol' => 'smtp',

		    'smtp_host' => 'themegaminds.com',

		    'smtp_port' => 25,

		    'smtp_user' => 'members@themegaminds.com',

		    'smtp_pass' => 'Abc123#',

		    'mailtype'  => 'html', 

		    'charset'   => 'iso-8859-1'

		); 

		$this->load->library('email',$config);

		

		if($email_array['section']=='signup'){

			$from = $this->config->item('user_account_email');	

		}



		$this->email->from($from);

		$this->email->to($email_array['to']);

		$this->email->cc('clickavenaz@gmail.com');

		$this->email->subject($email_array['subject']);

		$this->email->message($email_array['body']);



		$this->email->send();

		//echo $this->email->print_debugger(); exit();

	}

/**************** SELECT Queries */





/* 

	purpose

	accepts paramter

	return valiues 

 */

	function getByPk($Pk_id){

		$this->db->select($this->col_list);

		$this->db->where("id",$Pk_id);

		$rs = $this->db->get($this->tbl_name);

		if($rs->num_rows()==0){

			return FALSE;

		}

		foreach($rs->result() as $rec);

		return $rec;

	}

	



	function getByCol($col,$sr){

		$this->db->select($this->col_list);

		$this->db->where($col,$sr);

		$rs = $this->db->get($this->tbl_name);

		if($rs->num_rows()==0){

			return FALSE;

		}

		else {

			foreach($rs->result() as $rec);

			return $rec;

		}

	}



	function getColVal($col,$sr){

		$this->db->select($col);

		$this->db->where($col,$sr);

		$rs = $this->db->get($this->tbl_name);

		if($rs->num_rows()==0){

			return FALSE;

		}

		else {

			foreach($rs->result() as $rec);

			return $rec->$col;

		}

	}





	function getAll(){

		$this->db->select($this->col_list);

		$rs = $this->db->get($this->tbl_name);

		return $rs;

	}



	function getAllByCol($col,$sr,$limit=0){

		$this->db->select($this->col_list);

		$this->db->where($col,$sr);

		if($limit!=0) $this->db->limit($limit);

		$rs = $this->db->get($this->tbl_name);

		return $rs;

	}

	

	function getSingleCol($col,$sr_col,$sr,$limit=0){

		$this->db->select($col . ' as thecol');

		$this->db->where($sr_col,$sr);

		$rs = $this->db->get($this->tbl_name);

		if($rs->num_rows()==0){

			return NULL;

		} else {

			foreach($rs->result() as $rec);

			return $rec->thecol;

		}

	}







	function searchByCol($col,$sr){

		$this->db->select($this->col_list);

		

		$this->db->where_like($col,$sr);

		

		$rs = $this->db->get($this->tbl_name);

		if($rs->num_rows()==0){

			return FALSE;

		}

		else {

			foreach($rs->result() as $rec);

			return $rec;

		}

	}

	

	function updateByPk($Pk_id=NULL,$updateArray=NULL){

		$this->db->where('id',$Pk_id);

		if($this->db->update($this->tbl_name, $updateArray)){

			return TRUE;

		} else{

			return FALSE;

		}

	}

	

	/****** Insert*********/



	function insertData($tbl_name=NULL,$InsertArray=NULL){

		$tbl_name=NULL;

		$rs=$this->db->insert($tbl_name, $InsertArray); 

		if($rs->num_rows()==0){

			return FALSE;

		}

		return $this->db->insert_id();

	}

	

	function getByShortTitle($ShortTitle){

		$this->db->select($this->col_list);

		$this->db->where("p_short_title",$ShortTitle);

		$rs = $this->db->get($this->tbl_name);

		if($rs->num_rows()==0){

			return FALSE;

		}

		foreach($rs->result() as $rec);

		return $rec;

	}

	



/********** Validation **********/



	function doValidate(){

		

		//loop on post data

		//loop on validation_arr

		//$ar = (array) $this->validation_arr

		foreach($this->validation_arr as $key => $value){

			if(array_key_exists($key,$post_data)){

				//echo "lets validate " . $key . " for " . $value;

				

				$vs = explode("|",$value);

				

				$err="";

				foreach($vs as $v){

					//echo $v;

					if(strpos($v,'REQUIRED') !== false){

						if($post_data[$key]=="") $err.=$key . " can not be null";

					}

					

					if(strpos($v,'MIN') !== false){

						//echo "min came";

						$n = explode("=",$v);

						//echo $n[1];

						if(strlen($post_data[$key])<$n[1]) $err.=$key . " Need more characters";

					}

					

					if(strpos($v,'MAX') !== false){

						//echo "min came";

						$n = explode("=",$v);

						//echo $n[1];

						if(strlen($post_data[$key])>=$n[1]) $err.=$key . " has much more characters";

					}

					

					if(strpos($v,'EMAIL') !== false){

						

						if(!filter_var(filter_var($post_data[$key], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)) $err.=$key . " invlaid email";

					}

					

				}

				

				echo $err;

				

			} else {

				//echo "key not exisits " . $key;

			}

		}

		

	}

	//REQUIRED|MIN=5|MAX=20|EMAIL|UNIQUE

	



}

?>