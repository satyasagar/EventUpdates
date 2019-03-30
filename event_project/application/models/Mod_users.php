<?php
class Mod_users  extends MY_Model
{
	public $c_table = 'users';
	function __construct() 
	{
		parent::__construct();
		$this->tbl_name = 'users';
		$this->load->library('encrypt');
	}
	
	public function add($data = array())
	{
		$table_data = array();
		
		if($data['name']) $table_data['name'] = $data['name'];
		if($data['email']) $table_data['email'] = $data['email'];
		if($data['password']) $table_data['password'] = $this->encrypt->encode($data['password']);
		
		if(!empty($table_data))
		{
			$this->db->insert($this->c_table,$table_data);
			return $this->db->insert_id();
		}
		
		return FALSE;
	}
	
	public function edit($data = array(),$id=0)
	{
		$table_data = array();
		
		if($data['name']) $table_data['name'] = $data['name'];
		if($data['email']) $table_data['email'] = $data['email'];
		if($data['password']) $table_data['password'] = $this->encrypt->encode($data['password']);
		
		if(!empty($table_data))
		{
			$this->db
				->where('id',$id)
				->update($this->c_table,$table_data);
			return $id;
		}
		
		return FALSE;
	}
	
	public function login($email,$password)
	{
		$rs = $this->db
			->where('email',$email)
			->get($this->c_table);
		if($rs->num_rows() != 0)
		{
			foreach($rs->result() as $rec);
			
			$u_pass = $this->encrypt->decode( $rec->password );
			
			if($password == $u_pass)
			{
				$this->session->set_userdata('u_id',$rec->id);
				return TRUE;
			}
			else return FALSE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function delete($id)
	{
		$rs = $this->db
			->where('id',$id)
			->delete($this->c_table);
		if($rs) return TRUE;
		else return FALSE;
	}
	
	public function getall($where_key='',$where_val='')
	{
		if($where_key && $where_val){
			$this->db->where($where_key,$where_val);
		}
		
		if($this->input->get('search'))
		{
			$search = $this->input->get('search');
			$this->db->like('name',$search,'right');
			$this->db->or_like('email',$search,'right');
		}
		
		$rs = $this->db
			->get($this->c_table);
		if($rs->num_rows() != 0)
		{
			return $rs;
		}
		else
		{
			return FALSE;
		}
	}
}
?>