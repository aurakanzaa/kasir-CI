<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cetak_model extends CI_Model {
	public function view(){
		$this->db->select("id_produk, gambar, nama_produk, kategori, deskripsi, harga");
		$query = $this->db->get('produk');
		return $query->result();
	}

	public function view_peg(){
		$this->db->select("nama, email, ava, telp, username,role");
		$peg = $this->db->get('login');
		return $peg->result();
	}

	public function view_penjualan(){
		$this->db->select("id_detail, produk.nama_produk, tanggal_order, produk.harga, qty, total_harga");
		$this->db->from('detail_transaksi');
		$this->db->join('produk','produk.id_produk = detail_transaksi.id_produk');
		$penj = $this->db->get();
		return $penj->result();
	}

	
	

}
/* End of file cetak_model.php */
/* Location: ./application/models/cetak_model.php */