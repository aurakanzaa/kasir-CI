<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertProduk()
	{
		$object = array
		(
			'gambar' =>$this->upload->data('file_name'),
			'nama_produk' =>$this->input->post('nama_produk'),
			'kategori' =>$this->input->post('kategori'),
			'deskripsi' =>$this->input->post('deskripsi'),
			'harga' =>$this->input->post('harga'),
			'pajak'=>$this->input->post('pajak'),
		);
		$this->db->insert('produk',$object);
	}
	public function getDataProduk()
	{
		$query = $this->db->query("SELECT id_produk,gambar, nama_produk ,kategori ,deskripsi,harga,pajak from produk");
		return $query->result();
	}

	

	public function getProduk($id)
	{
		$this->db->where('id_produk',$id);
		$query = $this->db->get('produk');
		return $query->result();
	}	

	public function UpdateById($id){
		$data=array
		(
			'gambar' =>$this->upload->data('file_name'),
			'nama_produk' =>$this->input->post('nama_produk'),
			'kategori' =>$this->input->post('kategori'),
			'deskripsi' =>$this->input->post('deskripsi'),
			'harga' =>$this->input->post('harga'),
			'pajak'=>$this->input->post('pajak'),
			);
		$this->db->where('id_produk',$id);
		$this->db->update('produk',$data);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		$this->db->where('id_produk',$id);
		$this->db->delete('produk');
		
	}

	public function jmlProduk(){
		 $query = $this->db->query("SELECT produk.id_produk, SUM(qty) as 'qty', produk.gambar as 'gambar' from detail_transaksi
		 	join produk on produk.id_produk = detail_transaksi.id_produk");
		 return $query->result();
	}

	public function totalTransaksi(){
		$query = $this->db->query("SELECT SUM(total_harga) AS 'Total' FROM detail_transaksi where status = 'berhasil'");
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->query("SELECT SUM(qty) as 'qty' from detail_transaksi");
		return $query->result();
	}

}

/* End of file kasir_model.php */
/* Location: ./application/models/kasir_model.php */