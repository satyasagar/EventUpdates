<?php
class Mod_buildings  extends MY_Model
{
	public $c_table = "buildings";
	function __construct() 
	{
		parent::__construct();
		$this->tbl_name = "buildings";
	}

	public function add($data = array())
	{
		$table_data = array();	

		if($data['name']) $table_data['name'] = $data['name'];
		if($data['longitude']) $table_data['longitude'] = $data['longitude'];
		if($data['latitude']) $table_data['latitude'] = $data['latitude'];
		if($data['additional_info']) $table_data['additional_info'] = $data['additional_info'];

		if(!empty($table_data))
		{
			$this->db->insert($this->c_table,$table_data);
			return $this->db->insert_id();
		}
		return FALSE;
	}

	public function edit($data = array(),$id)
	{
		$table_data = array();

		if($data['name']) $table_data['name'] = $data['name'];
		if($data['longitude']) $table_data['longitude'] = $data['longitude'];
		if($data['latitude']) $table_data['latitude'] = $data['latitude'];
		if($data['additional_info']) $table_data['additional_info'] = $data['additional_info'];
		if(!empty($table_data))
		{
			$this->db
				->where('id',$id)
				->update($this->c_table,$table_data);
			return $id;
		}

		return FALSE;
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
			$this->db->or_like('longitude',$search,'right');
			$this->db->or_like('latitude',$search,'right');
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