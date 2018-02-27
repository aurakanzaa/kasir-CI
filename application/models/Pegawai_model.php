<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	public function insertPegawai(){
		$object = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telp' => $this->input->post('telp'),
			'username' => $this->input->post('username'),
			'pass' => md5($this->input->post('pass')),
			
		);
		$this->db->insert('login',$object);
	}

	public function getDataPegawai()
	{
		$query = $this->db->query("SELECT id, nama, email, telp, username, pass from login");
		return $query->result();
	}

	public function getPegawai($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('login');
		return $query->result();
	}	

	public function UpdateById($id){
		$data=array
		(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telp' => $this->input->post('telp'),
			'username' => $this->input->post('username'),
			'pass' => md5($this->input->post('pass')),
			);
		$this->db->where('id',$id);
		$this->db->update('login',$data);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('login');
		
	}
		public function insertData()
	{
		$session_data = $this->session->userdata('logged_in');
		
		$transaksi = array (
			'id_produk'=>$this->uri->segment(3),
			'qty'=> $this->input->post('qty'),

			);
		$this->db->insert('detail_transaksi	',$transaksi);
	}

}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */