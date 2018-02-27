<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Cetak_model');
		$this->load->library('dompdf_gen');
		$this->load->helper('url','file');
	}

	public function index(){
		$data['produk']=$this->Cetak_model->view();
		$this->load->view('preview_produk', $data);
	}

	public function cetakProduk(){
		$data['produk']=$this->Cetak_model->view();
		$this->load->view('print_produk', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$dompdf = new DOMPDF();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("lap_Produk.pdf");
		unset($html);
		unset($dompdf);
	}

	public function indexPegawai(){

		$data['pegawai']=$this->Cetak_model->view_peg();

		$this->load->view('preview_pegawai', $data);
	}

	public function cetakPegawai(){
		$data['pegawai']=$this->Cetak_model->view_peg();
		$this->load->view('print_pegawai', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$dompdf = new DOMPDF();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("lap_Pegawai.pdf");
		unset($html);
		unset($dompdf);
	}

	public function indexPenjualan(){
		$data['penjualan']=$this->Cetak_model->view_penjualan();
		$this->load->view('preview_penjualan',$data);
	}

	public function cetakPenjualan(){
		$data['penjualan']=$this->Cetak_model->view_penjualan();
		$this->load->view('print_penjualan', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$dompdf = new DOMPDF();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("lap_Penjualan.pdf");
		unset($html);
		unset($dompdf);
	}

	public function cetakExcel()
 	{
 		$data = array( 'title' => 'Produk Excel',
		'buku' => $this->Cetak_model->view());
		$this->load->view('print_excel',$data);
 	}



}

/* End of file Cetak.php */
/* Location: ./application/controllers/Cetak.php */