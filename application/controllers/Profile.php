<?php 

class Profile extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
        }else{
            redirect('login','refresh');
        }
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			$this->load->model('User');
			$session_data= $this->session->userdata('logged_in');
			$data['profile'] = $this->User->getProfil($session_data['id']);
			// $data['username']=$session_data['username'];
			if ($session_data['role'] === 'admin') {
				
    			$this->load->view('partials/header');
				$this->load->view('edit_profile',$data);
				$this->load->view('partials/footer');
    		}elseif($session_data['role'] === 'kasir'){
    			$this->load->view('partials/header_kasir');
    			$this->load->view('edit_profile',$data);
    			$this->load->view('partials/footer');
    		}
		}else{
			redirect('login','refresh');
		}
	}

	public function user(){

		$this->load->model('User');
		$session_data = $this->session->userdata('logged_in');

		$data['profile'] = $this->User->getProfil($session_data['id']);
		$this->load->view('edit_profile',$data);
	}



	public function  updateProfile($id){

		$this->load->model('User');

		$this->form_validation->set_rules('nama','nama','trim|required');
		$this->form_validation->set_rules('email','email','trim|required');
		$this->form_validation->set_rules('telp','telp','trim|required');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('pass','pass','trim|required');

		if ($this->form_validation->run() == FALSE) {
	
		}else { //Validasi Benar

			$config['upload_path'] = 'bower_components/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
        	$config['max_size']  = 100000;
			$config['max_width']  = 10240;
			$config['max_height']  = 7680;

        	$this->load->library('upload', $config);

        	if (!$this->upload->do_upload('ava')) {
        		$err = array('error' => $this->upload->display_errors());
        		var_dump($err); // Tampil Error Ketika gambar gagal simpan
        	}else{

        		//$path = "bower_components/uploads/"; // Tempat simpan gambar
            	//$get_record = $this->User->getProfil($id); // Ambil data melalui ID
            	//$file = $get_record[0]->ava; // Kolom Gambar
            	//unlink($path . $file); //Menghapus gambar yang akan diganti dengan gmbr baru

            	$image_data=$this->upload->data();

				$configer=array(
					'image_library' =>'gd2',
					'source_image' => $image_data['full_path'],
					'maintain_ratio'=>TRUE,
					'width'=> 150,
					'height'=>150,

					);
				$this->load->library('image_lib',$config);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();

        		$this->User->update($id); //Proses Update
        		//redirect('home','refresh');

		        		//login
		        		if($this->session->userdata('logged_in')){
							$this->load->model('User');
							$session_data= $this->session->userdata('logged_in');
							
							if ($session_data['role'] === 'admin') {
				    			$this->load->view('partials/header');
								redirect('home','refresh');
								$this->load->view('partials/footer');
				    		}elseif($session_data['role'] === 'kasir'){
				    			$this->load->view('partials/header_kasir');
				    			redirect('kasir','refresh');
				    			$this->load->view('partials/footer');
				    		}
						}else{
							redirect('login','refresh');
						}		
		        	}
				}
	}

	


}
?>