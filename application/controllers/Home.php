<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kasir_model');
		$this->load->model('kategori_model');
		$this->load->helper('html');
		$this->load->library('image_lib');
		
	}

	public function index()
	{
		//session agar tidak bisa dibuka
		if($this->session->userdata('logged_in')){
			$session_data= $this->session->userdata('logged_in');
			// $data['username']=$session_data['username'];
			if ($session_data['role'] === 'admin') {
				$this->load->model('kasir_model');
				$data['jum']=$this->kasir_model->jmlProduk();
				$data['tot']=$this->kasir_model->totalTransaksi();
				$data['jumlah']=$this->kasir_model->jumlah();
    			$this->load->view('partials/header');
				$this->load->view('dashboard',$data);
				$this->load->view('partials/footer');
    		}elseif($session_data['role'] === 'kasir'){
    			$this->load->view('partials/header_kasir');
    			$this->load->view('dashboard_kasir',$data);
    			$this->load->view('partials/footer');
    		}
		}else{
			redirect('login','refresh');
		}

		
	}

	

	//AJAX
	public function product(){
		$this->load->view('partials/header');
		$this->load->view('product');
		//$this->load->view('partials/footer');
		$this->load->view('partials/footer_ajax');

	}

	//AJAX
	public function data_server(){
		$this->load->library('Datatables');
		$this->datatables
			->select('id_produk,gambar,nama_produk,kategori.kategori,deskripsi,harga,pajak')
			->from('produk')
			->join('kategori','produk.kategori = kategori.id_kategori')	;
			echo $this->datatables->generate();
	}

	public function create(){
		
		$this->form_validation->set_rules('nama_produk','nama_produk','trim|required');
		$this->form_validation->set_rules('kategori','kategori','trim|required');
		$this->form_validation->set_rules('deskripsi','deskripsi','trim|required');
		$this->form_validation->set_rules('harga','harga','trim|required');
		$this->form_validation->set_rules('pajak','pajak','trim|required');
		$this->load->model('kasir_model');

		
		if($this->form_validation->run()==FALSE){
			$this->load->view('partials/header');
			$this->load->view('form_product');
			$this->load->view('partials/footer');
		}else{
			$config['upload_path'] = 'bower_components/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = 1000000;
			$config['max_width']  = 10240;
			$config['max_height']  = 7680;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('userfile')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('form_product',$error);
			}
			else{
				//$data = array('upload_data' => $this->upload->data());

				$upload = $this->upload->data();
				$confi['image_library']='gd2';
				$confi['source_image']=$upload['full_path'];
				$confi['maintain_ratio']=TRUE;
				$confi['height']=150;
				$confi['width']=1500;

				$this->load->library('image_lib',$config);
				$this->image_lib->clear();
				$this->image_lib->initialize($confi);
				$this->image_lib->resize();

				$this->kasir_model->insertProduk();
				$this->load->view('partials/header');
				$this->load->view('product');
				$this->load->view('partials/footer_ajax');
			}
		}
	}

	public function update($id){
		
		$this->form_validation->set_rules('nama_produk','nama_produk','trim|required');
		$this->form_validation->set_rules('kategori','kategori','trim|required');
		$this->form_validation->set_rules('deskripsi','deskripsi','trim|required');
		$this->form_validation->set_rules('harga','harga','trim|required');
		$this->form_validation->set_rules('pajak','pajak','trim|required');
		$this->load->model('kasir_model');

		$data['kasir']=$this->kasir_model->getProduk($id);
		$data['kategori']=$this->kategori_model->getDataKategori();
		$filename='gambar';
		
		if ($this->form_validation->run()==FALSE) {
			# code...
			$this->load->view('edit_product',$data);
		}else{

			$config['upload_path'] = 'bower_components/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = 100000;
			$config['max_width']  = 10240;
			$config['max_height']  = 7680;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('edit_product',$error);
				
			}
			else{
				$image_data=$this->upload->data();

				$configer=array(
					'image_library' =>'gd2',
					'source_image' => $image_data['full_path'],
					'maintain_ratio'=>TRUE,
					'width'=> 150,
					'height'=>150,

					);
				$this->load->library('image_lib',$config);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();

				$this->kasir_model->UpdateById($id);
				redirect('home/product','refresh');
			}
		}
	}

	public function delete($id){
		$this->kasir_model->delete($id);
		redirect('home/product','refresh');
		
	}

	public function form_product(){
		$data['kategori']=$this->kategori_model->getDataKategori();
		$this->load->view('partials/header');
		$this->load->view('form_product',$data);
		$this->load->view('partials/footer');
	}

	public function edit_product(){

		$this->load->view('partials/header');
		$this->load->view('edit_product');
		$this->load->view('partials/footer');
	}

	public function jumlah(){
		//top product
		$data['det']=$this->Kasir_model->getDataProduk();
		$data['jum']=$this->Kasir_model->jmlProduk();
		$this->load->view('partials/header');		
		$this->load->view('dashboard',$data);
		$this->load->view('partials/footer');
	}

	

	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */