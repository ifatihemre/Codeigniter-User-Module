<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModule
{
	private $module;
	private $user_table = 'users';

	public function __construct()
	{
		$this->module =& get_instance();
	}

	public function create($name=null,$email=null,$password=null,$role='user')
	{
		if(is_null($name) || is_null($email) || is_null($password))
		{
			return false;
		}

		$this->module->db->where('email', $email);
		$query = $this->module->db->get_where($this->user_table);

		if($query->num_rows() > 0)
		{
			return false;
		}

		$data = array(
			'name'=>$name,
			'email'=>$email,
			'password'=>md5($password),
			'role'=>$role,
			'created_at'=>date("Y-m-d H:i:s", time()),
			'updated_at'=>"0000-00-00 00:00:00"
		);

		$this->module->db->set($data);

		if($this->module->db->insert($this->user_table))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function read(){}

	public function update(){}

	public function delete(){}

	public function auth(){
		return $this->module->session->userdata('logged_in') == true ? true : false;
	}

	public function login($email='', $password='')
	{
		if(trim($email) == '' || trim($password) == '')
		{
			return false;
		}

		$this->module->db->where('email', $email);
		$this->module->db->where('password', md5($password));
		$query = $this->module->db->get_where($this->user_table);

		if($query->num_rows() > 0)
		{
			$user_data = $query->row_array();
			$this->module->session->sess_destroy();
			$this->module->session->sess_create();

			
			$data = array(
				'name'=>$user_data['name'],
				'email'=>$user_data['email'],
				'role'=>$user_data['role'],
				'logged_in'=> true
			);
			unset($user_data);
			$this->module->session->set_userdata($data);
			return true;

		}
		else
		{
			return false;
		}

	}

	public function logout()
	{
		$this->module->session->sess_destroy();
	}

}
?>