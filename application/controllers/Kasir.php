<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kasir_model');
		$this->load->model('kategori_model');
		$this->load->model('pegawai_model');
		$this->load->model('penjualan_model');
		$this->load->model('Pembelian_model');
		$this->load->model('user');
		$this->load->helper('html');
		$this->load->library('image_lib');
		
	}

	public function index()
	{
		$object['produk']= $this->kasir_model->getDataProduk();
		//session agar tidak bisa dibuka
		if($this->session->userdata('logged_in')){
			$session_data= $this->session->userdata('logged_in');
			// $data['username']=$session_data['username'];
			if ($session_data['role'] === 'admin') {
    			$this->load->view('partials/header');
				$this->load->view('dashboard');
				$this->load->view('partials/footer');
    		}elseif($session_data['role'] === 'kasir'){
    			$this->load->view('partials/header_kasir');
    			$this->load->view('dashboard_kasir',$object);
				$this->load->view('partials/footer_kasir');
    		}
		}else{
			redirect('login','refresh');
		}	

	}

	public function index2($id)
	{
			$this->load->model('penjualan_model');
		$this->penjualan_model->insertData();
		$object['produk']= $this->penjualan_model->getDetail();
		//session agar tidak bisa dibuka
		if($this->session->userdata('logged_in')){
			$session_data= $this->session->userdata('logged_in');
			// $data['username']=$session_data['username'];
				
    			$this->load->view('partials/header_kasir');
    			$this->load->view('sementara',$object);
				$this->load->view('partials/footer_kasir');
    		
		}else{
			redirect('login','refresh');
		}	
	}



	public function insert(){
		$this->penjualan_model->insertData();
		$this->load->view('partials/header_kasir');
		$this->load->view('sementara');
		$this->load->view('partials/footer_kasir');
	}

		public function update($id){
		$this->penjualan_model->updateData($id);
		redirect('kasir/index','refresh');
		// $this->load->view('partials/header_kasir');
		// $this->load->view('sementara');
		// $this->load->view('partials/footer_kasir');
	}

	//blm dipake
	//AJAX
	public function data_server(){
		$this->load->library('Datatables');
		$this->datatables
			->select('id_detail,produk.gambar, produk.nama_produk, qty, produk.harga, total_harga')
			->from('detail_transaksi')
			->join('produk','produk.id_produk = detail_transaksi.id_produk')	;
			echo $this->datatables->generate();
	}

	public function pembelian(){
		$data['det']=$this->Pembelian_model->getDataPembelian();
		$data['jum']=$this->Pembelian_model->getJumlah();
		$this->load->view('partials/header_kasir');		
		$this->load->view('pembelian',$data);
		$this->load->view('partials/footer');
	}

	public function dataPemb($id){
		$data['detail']=$this->Pembelian_model->getDetailTransaksi($id);
		$data['produk']=$this->kasir_model->getDataProduk();
		$data['detail_transaksi']=$this->Pembelian_model->getDataPembelian();
	}

	public function kembalian(){
		$total = $this->input->post('harga');
	$uang = $this->input->post('uang');
	$kembalian = $uang - $total;
	$data['uang'] = $uang;
	$data['total'] = $total;
	$data['kembalian'] = $kembalian;
	$this->Pembelian_model->UpdateStatus();
		$this->load->view('partials/header_kasir');		
		$this->load->view('kembalian',$data);
		$this->load->view('partials/footer');
	}

	public function delete($id){
		$this->Pembelian_model->delete($id);
		redirect('kasir/pembelian','refresh');
	}

	

	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */