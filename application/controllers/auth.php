<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			$this->load->view('login');
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='admin')
			{
				header('location:'.base_url().'admin');
			}
			else if($st=='user')
			{
				header('location:'.base_url().'user');
			}
		}
	}
	public function admin_view()
	{
		$this->load->view('dashboard_admin');
	}
	

	public function login()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$this->model_otp->getLoginData($u,$p);
	}

	public function logout()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'');
		}
		else
		{
			$this->session->sess_destroy();
			header('location:'.base_url().'');
		}
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/login.php */
