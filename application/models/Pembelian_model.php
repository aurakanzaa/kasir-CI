<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {

	public function getDataPembelian()
	{
		$query = $this->db->query("SELECT * from detail_transaksi join produk on detail_transaksi.id_produk = produk.id_produk where status = 'tidak'");
		return $query->result();
	}

	public function getJumlah()
	{
		$query = $this->db->query("SELECT SUM(total_harga) AS 'Total'
						FROM detail_transaksi where status = 'tidak'");
		return $query->result();
	}

	public function getDetailTransaksi($id)
	{
		$this->db->where('id_detail',$id);
		$query = $this->db->get('detail_transaksi');
		return $query->result();
	}	

	public function UpdateById($id){
		$data=array
		(
			'qty' => $this->input->post('qty'),
			
			);
		$this->db->where('id_detail',$id);
		$this->db->update('detail_transaksi',$data);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function UpdateStatus(){
		$data=array
		(
			'status' => 'berhasil',
			
			);
		$this->db->where('status','tidak');
		$this->db->update('detail_transaksi',$data);
		if($this->db->affected_rows()=='berhasil'){
			return true;
		}else{
			return false;
		}
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

/* End of file Pembelian_model.php */
/* Location: ./application/models/Pembelian_model.php */