<?php 
class Upload extends CI_Controller{
	
	public function index(){		
		$this->load->view('upload');		
	}	
	public function input(){
		$con = array(
			// ISINE DISESUAIKAN KARO AUTHENTIKASI FILE E
			'upload_path' => 'images/',
			'allowed_types' => 'jpg|jpeg|png',
			'max_size' => 0,
			// 'filename' => url_title($this->input->post('NAME FORM FILE ning VIEW'))
			'filename' => url_title($this->input->post('foto'))
		);

		$this->load->library('upload', $con);
		// if ($this->upload->do_upload('NAME FORM FILE ning VIEW')){
		if ($this->upload->do_upload('foto')){
			$this->db->insert('foto', array(
				// 'field' => $this->input->post('name form input'),
				'nama'=> $this->input->post('nama'),
				'foto' => $this->upload->file_name
			));
		}
		else {
			// echo "GAGAL";
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('view form', $error);
		}
	}



	public function edit($id){
		/* Contoh URL 
		 * 127.0.0.1/upload/edit/1
		 * 127.0.0.1/upload/edit/2
		 */		
		@$where = array('id' => $id);
		@$data['terserah'] = $this->crud->edit($where,'foto')->row();
		$this->load->view('edit_gambar', $data);
	}

	public function update(){				
		$con = array(	
			'upload_path' => 'images/',
			'allowed_types' => 'jpg|jpeg|png',
			'max_size' => 0,			
			'filename' => url_title($this->input->post('foto'))
		);

		$this->load->library('upload', $con);
		// if ($this->upload->do_upload('NAME FORM FILE ning VIEW')){
		if ($this->upload->do_upload('foto')){
			@$data = array(		
					'nama' => $this->input->post('nama'),
					'foto' => $this->upload->file_name

					/*
					 *
					 * DST,
					 *
					*/
			);
			@$where = array(
					'id' => $this->input->post('id')
					);
			@$update = $this->crud->update($where,$data,'foto');
			if ($update){
				echo "YEAY";
			}
			else {
				echo "OPS";
			}
		}
		else{			
			echo "GAMBAR?";			 
		}

	}
	
		
}
?>