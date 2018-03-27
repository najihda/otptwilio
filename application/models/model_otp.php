<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Otp extends CI_Model {
	//model login user & admin
	public function getLoginData($usr,$psw)
	{
		$u = ($usr);
		$p = md5($psw);
		$q_cek_login = $this->db->get_where('tblogin', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach ($q_cek_login->result() as $qck)
			{
				if($qck->stts=='user')
				{
					$q_ambil_data = $this->db->get_where('tbuser', array('id_user' => $u));
					foreach($q_ambil_data -> result() as $qad)
					{
						$sess_data['logged_in']	= 'yes';
						$sess_data['id_user'] 		= $qad->id_user;
						$sess_data['nama_user']= $qad->nama_user;
						$sess_data['stts'] 		= 'user';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'user');
				}
				else if($qck->stts=='admin')
				{
					$q_ambil_data = $this->db->get_where('tbadmin', array('id_admin' => $u));
					foreach($q_ambil_data -> result() as $qad)
					{
						$sess_data['logged_in']	= 'yes';
						$sess_data['id_admin'] 	= $qad->id_admin;
						$sess_data['nama_admin']= $qad->nama_admin;
						$sess_data['stts'] 		= 'admin';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'admin');
				}
			}
		}
		else
		{
        	header('location:'.base_url().'');
			$this->session->set_flashdata('info','<div class="alert alert-danger" role="alert"> USERNAME ATAU PASSWORD SALAH..! </div>');
		}
	}

}

/* End of file model_otp.php */
/* Location: ./application/model/model_otp.php */
