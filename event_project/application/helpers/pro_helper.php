<?php
if(!function_exists('gcurrency'))
{
	function gcurrency($vl){
		//return "&pound;" . $vl;
		return "$" . $vl;
	}
}

	function print_b($arr){
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}

	function echo_b($str){
		echo $str;
		echo "<hr>";
	}
	
	function is_dev(){
		if($_SERVER['HTTP_HOST']=="dev.experts.adclickxpress.com"){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getRealIP(){
		
		//if ($_SERVER['REMOTE_ADDR']) $ipa = $_SERVER['REMOTE_ADDR'];
		//if ($_SERVER['HTTP_X_FORWARDED_FOR']) $ipa = $_SERVER['HTTP_X_FORWARDED_FOR'];
		//if ($_SERVER['HTTP_X_REAL_IP']) $ipa = $_SERVER['HTTP_X_REAL_IP'];
		
		//return $ipa;
		
		$ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
		
	}
	
	function generate_msg($key,$custom_msg="")
	{
	  $msg = NULL;
	  
	  if($key=="invalid_user") $msg = "Invalid email or password";
	  if($key=="email_sent") $msg = "The Email was Successfully Sent!";
	  if($key=="not_login") $msg = "Please login to access your account area";
	  if($key=="login_require") $msg = "You need to login to continue";
	  if($key=="login_success") $msg = "You've successfully logged in!";
	  if($key=="admin_login_error") $msg = "You've entered invalid email or password!";
	  if($key=="signup_success") $msg = "You've successfully Signed Up!";
	  if($key=="logout_success") $msg = "You've successfully logged out!";
	  if($key=="validation_error") $msg = "Please fix following erros: <br />" . validation_errors();
	  if($key=="inactive_account") $msg = "Your Account is Inactive. Contact support for more info.";
	  if($key=="custom_msg") $msg = $custom_msg;
	  
	  if($msg == NULL) return FALSE;
	  return $msg;
	}
	
	function redirect_with_info($msg,$type,$file,$line,$method,$redirect_url="",$other_val = array()){
		$CI = get_instance();
		
		if($type == 1) $s_type = "error";
		if($type == 2) $s_type = "warning";
		if($type == 3) $s_type = "success";
		
		$method = substr($method, strpos($method, ":") + 2);
		
		if(!empty($other_val))
		{
			$data['msg'] = array(
				'type' => $s_type,
				'screen'=>$method,
				'message' => $msg,
				'other' => $other_val
			);
			$CI->session->set_flashdata("err",$data);
		}
		else
		{
			$data['msg'] = array(
				'type' => $s_type,
				'screen'=>$method,
				'message' => $msg,
			);
			
			$CI->session->set_flashdata("err",$data);			
		}
		//print_b($data);
		
		if($redirect_url != ""){
			redirect($redirect_url);
		}else{
			redirect(site_url());
		}
	}
	
	function config($key)
	{
		$CI = get_instance();
		
		$CI->db->select("config_val")
			->where("config_key",$key);
		$rs_config = $CI->db->get("config");
		if($rs_config->num_rows() != 0)
		{
			foreach($rs_config->result() as $rec_config);
			return $rec_config->config_val;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	
	function test(){
		$CI = get_instance();
	    $check = $CI->db->get("users");
		foreach($check->result() as $test){
			print_b($test);
		}
		//print_r($CI->session->all_userdata());
	}
	
	function remove_quote($value){
		$value = str_replace("'","",$value);
		$value = str_replace('"','',$value);
		return $value;
	}
	
	function sqlfilter($value){
		if(is_array($value))
		{
			$result = array();
			
			foreach($value as $key=>$val)
			{
				$result[$key] = mysql_real_escape_string(htmlspecialchars($val));
			}
			
			return $result;
		}
		else return mysql_real_escape_string(htmlspecialchars($value));
	}
	
	function dropslash($value)
	{
		return stripslashes($value);
	}
	
	function clean($value)
	{
		return htmlentities($value);
	}

?>