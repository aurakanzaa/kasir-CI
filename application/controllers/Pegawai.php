<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kasir_model');
		$this->load->model('kategori_model');
		$this->load->model('pegawai_model');
		$this->load->helper('html');
		$this->load->library('image_lib');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data= $this->session->userdata('logged_in');
			// $data['username']=$session_data['username'];
			if ($session_data['role'] === 'admin') {
    			$object['peg']=$this->pegawai_model->getDataPegawai();
				$this->load->view('partials/header');
				$this->load->view('staff',$object);
				$this->load->view('partials/footer');	
    		}elseif($session_data['role'] === 'kasir'){
    			redirect('login','refresh');
    		}
		}else{
			redirect('login','refresh');
		}	
		
	}

	public function form_pegawai(){
		$this->load->view('partials/header');
		$this->load->view('form_pegawai');
		$this->load->view('partials/footer');
	}

	public function create(){
		$this->form_validation->set_rules('nama','nama','trim|required');
		$this->form_validation->set_rules('email','email','trim|required');
		$this->form_validation->set_rules('telp','telp','trim|required');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('pass','pass','trim|required');
		$this->load->model('pegawai_model');

		if($this->form_validation->run()==FALSE){
			$this->load->view('partials/header');
			$this->load->view('form_pegawai');
			$this->load->view('partials/footer');
		}else{
			
			$this->pegawai_model->insertPegawai();
			$this->load->view('partials/header');
			redirect('pegawai','refresh');
			$this->load->view('partials/footer');
		}
	}

	public function update($id){
		$this->form_validation->set_rules('nama','nama','trim|required');
		$this->form_validation->set_rules('email','email','trim|required');
		$this->form_validation->set_rules('telp','telp','trim|required');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('pass','pass','trim|required');
		$data['login']=$this->pegawai_model->getPegawai($id);

		if($this->form_validation->run()==FALSE){
			$this->load->view('partials/header');
			$this->load->view('edit_pegawai',$data);
			$this->load->view('partials/footer');
		}else{
			$this->pegawai_model->UpdateById($id);
			redirect('pegawai','refresh');
		}
	}

	public function delete($id){
		$this->pegawai_model->delete($id);
		redirect('pegawai','refresh');
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */