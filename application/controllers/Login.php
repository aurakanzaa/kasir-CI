<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function cekLogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		//callback_cekDb ->cekDb merupakan nama function
		$this->form_validation->set_rules('pass', 'pass', 'trim|required|callback_cekDb');

		if($this->form_validation->run()==FALSE){
			$this->load->view('login_view');
		}else{
			if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
					if ($session_data['role'] == 'admin') {
						redirect('Home','refresh');
					}elseif($session_data['role'] == 'kasir'){
						redirect('Kasir','refresh');
					}//Penutub Else IF
			}//Penutub if Pertama

		}
	}

	public function cekDb($password)
	{
		$username=$this->input->post('username');
		$result=$this->user->login($username,$password);
		if($result){
			$sess_array=array();
			foreach ($result as $row) {
				$sess_array=array(
					'id'=>$row->id,
					'username'=>$row->username,
					'ava'=>$row->ava,
					'role'=>$row->role
					);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDb',"Login Gagal ");
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	
	public function register()
	{	
		$this->form_validation->set_rules('nama','nama','trim|required');
		$this->form_validation->set_rules('email','email');
		$this->form_validation->set_rules('telp','telp','trim|required');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('pass','pass','trim|required');
		

		if($this->form_validation->run()==FALSE){
			$this->load->view('register_view');
		}else{
			$this->user->register();
			redirect('login');
		}
		
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */