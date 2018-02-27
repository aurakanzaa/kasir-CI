<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertData()
	{
		$session_data = $this->session->userdata('logged_in');
		
		$transaksi = array (
			'id_produk'=>$this->uri->segment(3),
			);
		$this->db->insert('detail_transaksi	',$transaksi);
		$order= $this->db->get("detail_transaksi")->row();

		$object = array(
			'id'=>$session_data['id'],
			'id_detail'=>$order->id_detail,
			);
		
		$this->db->insert('transaksi',$object);
	}

	public function getDetail()
	{

		$query = $this->db->query("select * from detail_transaksi order by id_detail desc");
		return $query->result();
	}

	public function updateData($id)
 	{
 		$session_data = $this->session->userdata('logged_in');
	  	$this->db->where('id_produk', $this->uri->segment(4));
	 	$q = $this->db->get('produk')->row();
	  	$transaksi = array 
	  	(
		   'qty'=>$this->input->post('qty'),
		   'total_harga'=>$q->harga*$this->input->post('qty'),
	   	);
	  $this->db->where('id_detail',$id);
	  $this->db->update('detail_transaksi ',$transaksi);
	 }

	 public function delete($id){
	 	$this->db->where('id_detail',$id);
		$this->db->delete('detail_transaksi');
	 }

	 public function detailTransaksi(){
		$session_data = $this->session->userdata('logged_in');
		
		$object=array
		(
			
			$data['username'] = $session_data['username'],
			'id_detail' => $this->input->post('id_detail')
		);
		$this->db->insert('transaksi',$object);
	}


}

/* End of file Penjualan_model.php */
/* Location: ./application/models/Penjualan_model.php */



