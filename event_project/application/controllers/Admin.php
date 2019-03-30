<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_users');
		$this->load->model('mod_buildings');
		$this->load->model('mod_events');
	}
	
	public function index()
	{
		if($_POST)
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			$rs = $this->mod_users->login($email,$password);
			if($rs)
			{
				redirect( site_url('admin/dashboard') );
			}
			else
			{
				$this->session->set_flashdata('error','Invalid Email or Password');
			}
		}
		$this->load->view('en/default/admin/partials/login_form');
	}
	
	public function dashboard()
	{
		$this->check_session();
		
		$this->get_admin_view('dashboard');
	}
	
	public function users($action="",$id="")
	{
		$this->check_session();
		
		if($action == "")
		{
			$data['rs'] = $this->mod_users->getall();
			$this->get_admin_view('users/list',$data);
		}
		
		if($action == "add")
		{
			if($_POST)
			{
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				
				if($name) $data['name'] = $name;
				if($email) $data['email'] = $email;
				if($password) $data['password'] = $password;
				
				$rs = $this->mod_users->add($data);
				
				if($rs) redirect(site_url('admin/users/'));
			}
			
			$this->get_admin_view('users/add');
		}
		
		if($action == "edit")
		{
			if($_POST)
			{
				$id = $this->input->post('id');
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				
				if($name) $data['name'] = $name;
				if($email) $data['email'] = $email;
				if($password) $data['password'] = $password;
				
				$rs = $this->mod_users->edit($data,$id);
				if($rs) redirect(site_url('admin/users/'));
			}
			
			$data['rs'] = $this->mod_users->getall('id',$id);
			
			if(!$data['rs']) redirect(site_url('admin/users'));
			
			$this->get_admin_view('users/edit',$data);
		}	
		
		if($action == "delete")
		{
			$data['rs'] = $this->mod_users->getall('id',$id);
			if(!$data['rs']) redirect(site_url('admin/users'));
			
			$this->mod_users->delete($id);
			redirect(site_url('admin/users'));
		}
	}
	
	public function buildings($action="",$id="")
	{
		$this->check_session();
		
		if($action == "")
		{
			$data['rs'] = $this->mod_buildings->getall();
			$this->get_admin_view('buildings/list',$data);
		}
		
		if($action == "add")
		{
			if($_POST)
			{
				$name = $this->input->post('name');
				$longitude = $this->input->post('longitude');
				$latitude = $this->input->post('latitude');
				$info = $this->input->post('additional_info');
				
				if($name) $data['name'] = $name;
				if($longitude) $data['longitude'] = $longitude;
				if($latitude) $data['latitude'] = $latitude;
				if($info) $data['additional_info'] = $info;
				
				$rs = $this->mod_buildings->add($data);
				
				if($rs) redirect(site_url('admin/buildings/'));
			}
			
			$this->get_admin_view('buildings/add');
		}
		
		if($action == "edit")
		{
			if($_POST)
			{
				$data = array();
				$id = $this->input->post('id');
				$name = $this->input->post('name');
				$longitude = $this->input->post('longitude');
				$latitude = $this->input->post('latitude');
				$info = $this->input->post('additional_info');
				if($name) $data['name'] = $name;
				if($longitude) $data['longitude'] = $longitude;
				if($latitude) $data['latitude'] = $latitude;
				if($info) $data['additional_info'] = $info;
				$rs = $this->mod_buildings->edit($data,$id);
				if($rs) redirect(site_url('admin/buildings/'));
			}
			
			$data['rs'] = $this->mod_buildings->getall('id',$id);
			
			if(!$data['rs']) redirect(site_url('admin/buildings'));
			
			$this->get_admin_view('buildings/edit',$data);
		}
		
		if($action == "delete")
		{
			$data['rs'] = $this->mod_buildings->getall('id',$id);
			if(!$data['rs']) redirect(site_url('admin/buildings'));
			
			$this->mod_buildings->delete($id);
			redirect(site_url('admin/buildings'));
		}
	}
	
	public function events($action="",$id="")
	{
		$this->check_session();
		
		
		if($action == "")
		{
			$data['rs'] = $this->mod_events->getall();
			$this->get_admin_view('events/list',$data);
		}
		
		if($action == "add")
		{
			if($_POST)
			{
				$data = array();
				$id = $this->input->post('id');
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$building_id = $this->input->post('building_id');
				$room = $this->input->post('room');
				$time = $this->input->post('date');
				
				$hour=$this->input->post('hours_ev');
				$mint=$this->input->post('minutes_ev');
				$am_em=$this->input->post('am_ev');
				$date = $hour.":".$mint." ".$am_em;
				

				if($title) $data['title'] = $title;
				if($description) $data['description'] = $description;
				if($building_id) $data['building_id'] = $building_id;
				if($time) $data['date'] = date("Y-m-d",strtotime($time));
				if($date) $data['time'] = $date;
				if($room) $data['room'] = $room;
				
				$rs = $this->mod_events->add($data);
				
				if($rs) redirect(site_url('admin/events/'));
			}
			$this->get_admin_view('events/add');
		}
		
		if($action == "edit")
		{
			if($_POST)
			{
				$data = array();
				$id = $this->input->post('id');
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$building_id = $this->input->post('building_id');
				$time = $this->input->post('date');
				$room = $this->input->post('room');
				$hour=$this->input->post('hours_ev');
				$mint=$this->input->post('minutes_ev');
				$am_em=$this->input->post('am_ev');
				$date = $hour.":".$mint." ".$am_em;
				
				if($title) $data['title'] = $title;
				if($description) $data['description'] = $description;
				if($building_id) $data['building_id'] = $building_id;
				if($time) $data['date'] = date("Y-m-d",strtotime($time));
				if($date) $data['time'] = $date;
				if($room) $data['room'] = $room;
				
				$rs = $this->mod_events->edit($data,$id);
				if($rs) redirect(site_url('admin/events/'));
			}
			
			$data['rs'] = $this->mod_events->getall('id',$id);
			if(!$data['rs']) redirect(site_url('admin/events'));
			
			$this->get_admin_view('events/edit',$data);
		}
		
		if($action == "delete")
		{
			$data['rs'] = $this->mod_events->getall('id',$id);
			if(!$data['rs']) redirect(site_url('admin/events'));
			
			$this->mod_events->delete($id);
			redirect(site_url('admin/events'));
		}
	}
	
	public function check_session()
	{
		
		if(!$this->session->userdata('u_id'))
		{
			$this->session->set_flashdata('error','Please login to continue!');
			redirect(site_url('admin'));
		}
	}
	
	public function get_data($all='')
	{
		header('Access-Control-Allow-Origin: *');
		$data = array();
		
		$buildings = array(0);
		if($all)
		{
			$rs_event = $this->mod_events->getall('date >=',date('Y-m-d'));
		}
		else
		{
			$rs_event = $this->mod_events->getall('date',date('Y-m-d'));
		}
		
		
		if($rs_event)
		{
			foreach($rs_event->result() as $rec_events)
			{
				$buildings[] = $rec_events->building_id;
			}
		}
		
		if($all == '') $this->db->where_in('id',$buildings);
		$rs = $this->mod_buildings->getall();
		if($rs)
		{
			foreach($rs->result() as $rec)
			{
				$events = array();
				$rs_event = $this->mod_events->getall('building_id',$rec->id);
				if($rs_event)
				{
					foreach($rs_event->result() as $rec_events)
					{
						$events[] = array(
							'id'			=>	$rec_events->id,
							'title'			=>	$rec_events->title,
							'description'	=>	$rec_events->description,
							'time'			=>	$rec_events->time,
							'date'			=>	$rec_events->date,
							'room'			=>	$rec_events->room
						);
					}
				}
				
				$data[] = array(
					'id'		=>	$rec->id,
					'name'		=>	$rec->name,
					'longitude'	=>	$rec->longitude,
					'latitude'	=>	$rec->latitude,
					'events'	=>	$events
				);
			}
		}
		
		if(empty($data)) echo json_encode('empty');
		else echo json_encode($data);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}
}
