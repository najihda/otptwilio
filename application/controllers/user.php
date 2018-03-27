<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/user
	 *	- or -
	 * 		http://example.com/index.php/user/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/user/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  	public function index()
 	{
    	$cek = $this->session->userdata('logged_in'); $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='user')
		{
      		$bc['nama'] = $this->session->userdata('nama_user');
			$this->load->view('step2',$bc);
		}
		else { header('location:'.base_url().''); }
 	}
 	
	public function step2()
	{
		$this->load->view('step2');
	}
	public function otp_view()
	{
		$this->load->view('otp_view');
	}
	public function user_view()
	{
		$this->load->view('dashboard_user');
	}

 	public function smsotp()
 	{
    	$cek = $this->session->userdata('logged_in'); $stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='user')
		{
      		$bc['nama'] = $this->session->userdata('nama_user');

			$this->load->view('otp_view',$bc);
		}
		else { header('location:'.base_url().''); }
 	}
}
