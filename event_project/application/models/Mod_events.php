<?php

class Mod_events  extends MY_Model

{

	public $c_table = "events";

	function __construct() 

	{

		parent::__construct();

		$this->tbl_name = "events";

	}

	

	public function add($data = array())

	{

		$table_data = array();

		

		if($data['title']) $table_data['title'] = $data['title'];

		if($data['description']) $table_data['description'] = $data['description'];

		if($data['building_id']) $table_data['building_id'] = $data['building_id'];

		if($data['date']) $table_data['date'] = $data['date'];
		if($data['time']) $table_data['time'] = $data['time'];
		if($data['room']) $table_data['room'] = $data['room'];

		

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

		

		if($data['title']) $table_data['title'] = $data['title'];

		if($data['description']) $table_data['description'] = $data['description'];

		if($data['building_id']) $table_data['building_id'] = $data['building_id'];

		if($data['date']) $table_data['date'] = $data['date'];
		if($data['time']) $table_data['time'] = $data['time'];
		if($data['room']) $table_data['room'] = $data['room'];


		

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

			$this->db->like('title',$search,'right');

			$this->db->or_like('description',$search,'right');

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