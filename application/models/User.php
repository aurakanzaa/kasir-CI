<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function Login($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('pass',md5($password));
		$query=$this->db->get('login');
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	public function register(){
		
				$data = array(
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'telp' => $this->input->post('telp'),
					'username' => $this->input->post('username'),
					'pass' => md5($this->input->post('pass')),
					
				);
				$this->db->insert('login',$data);
			}
	
	public function getProfil($id){
			$this->db->where('id',$id);
			$query = $this->db->get('login');
				
			if($query->num_rows() == 1){
				return $query->result();
			}else{
				return false;
			}	
	}

	public function update($id){

			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'ava' => $this->upload->data('file_name'),
				'telp' => $this->input->post('telp'),
				'username' => $this->input->post('username'),
				'pass' => md5($this->input->post('pass')),
			);

			$this->db->where('id',$id);
			$this->db->update('login',$data);

		}	


}

/* End of file user.php */
/* Location: ./application/models/user.php */