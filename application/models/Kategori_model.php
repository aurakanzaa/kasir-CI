<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function insertKategori()
	{
		$object = array(
			'kategori' => $this->input->post('kategori')
		);
		$this->db->insert('kategori',$object);
	}
	public function getDataKategori()
	{
		$query = $this->db->get('kategori');
		return $query->result();
	}

	public function getKategori($id)
	{
		$this->db->where('id_kategori',$id);
		$query = $this->db->get('kategori');
		return $query->result();
	}	

	public function UpdateById($id){
		$data=array
		(
			
			'kategori' =>$this->input->post('kategori'),
			
			);
		$this->db->where('id_kategori',$id);
		$this->db->update('kategori',$data);
		if($this->db->affected_rows()==1){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		$this->db->where('id_kategori',$id);
		$this->db->delete('kategori');
		
	}

}

/* End of file kasir_model.php */
/* Location: ./application/models/kasir_model.php */