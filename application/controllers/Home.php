<?php

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
	}

	public function __destruct()
	{
		
	}

	public function index()
	{
		$this->load->view('layouts/header');
		if($this->usermodule->auth())
		{
			$data = array('name'=>$this->session->userdata('name'));

			$this->load->view('dashboard', $data);
		}
		else
		{
			$login_error = $this->session->flashdata('login_error') ?: null;
			
			
			$this->load->view('home', array('login_error'=>$login_error));
		}
		$this->load->view('layouts/footer');
	}

	public function login()
	{

		$data = $this->input->post();
		$login = $this->usermodule->login($data['email'], $data['password']);
		if(!$login)
		{
			$this->session->set_flashdata('login_error', 'Kullanıcı adı / Şifre hatası!');
		}

		redirect('/');

	}

	public function logout()
	{
		$this->usermodule->logout();
		redirect('/');
	}

}