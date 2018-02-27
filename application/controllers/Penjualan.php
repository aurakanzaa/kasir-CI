<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('kasir_model');
		$this->load->model('kategori_model');
		$this->load->model('pegawai_model');
		$this->load->model('penjualan_model');
		$this->load->model('user');
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
    			$this->load->view('partials/header');
				$this->load->view('penjualan');
				$this->load->view('partials/footer_penjualan');
    		}elseif($session_data['role'] === 'kasir'){
    			$this->load->view('partials/header_kasir');
				$this->load->view('penjualan');
				$this->load->view('partials/footer_penjualan');
    		}
		}else{
			redirect('login','refresh');
		}
	}
	
	//AJAX
	public function data_server(){
		$this->load->library('Datatables');
		$this->datatables
			->select('id_detail, produk.nama_produk, tanggal_order,produk.harga, qty, total_harga,status')
			->from('detail_transaksi')
			->join('produk','detail_transaksi.id_produk = produk.id_produk')	;
			echo $this->datatables->generate();
	}
	public function delete($id){
		$this->penjualan_model->delete($id);
		redirect('penjualan','refresh');
	}
}
/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */