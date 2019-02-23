<?php 
class DSN extends CI_Controller{
	public function index(){
		if ($this->session->log_stat == True) {			
			//QUERY
			$data['hasil'] = $this->crud->tampil('dosen')->result();
			//END OF QUERY
			//GAK PENTING
			$data['page'] = 'Show';	
			$data['tabel'] = 'dosen/show';	
			$data['edit'] = 'Dsn/edt/';
			$data['del'] = 'Dsn/del/';		
			$data['base'] = 'Dsn/';			
			$data['jdl'] = 'Data Dosen';
			$data['input'] = 'Dsn/input';
			$data['dsn'] = 'active';					
			//END OF GAK PENTING
			$this->load->view('dashboard',$data);		
		}
		else{
			redirect('login');
		}
	}	
	public function input(){
		//CEK Login
		if ($this->session->log_stat == True) {		
		$this->load->view('dosen/input');		
		}
	else{
			redirect('login');
		}
	}	
	public function add(){
		//CEK Login
		if ($this->session->log_stat == True) {						
		// Query Input
		@$data = array(
				'nip' => preg_replace('/[^a-zA-Z0-9]/', '',$this->input->post('nip')),
				'namadsn' => htmlspecialchars($this->input->post('nama'),ENT_QUOTES),	
				'alamat' => htmlspecialchars($this->input->post('alamat'), ENT_QUOTES),
				'tgl' => $this->input->post('tgl'),
				'jk' => $this->input->post('jk'),
		);
		//Cek Hasil Query
		@$masuk = $this->crud->tambah('dosen',$data); //memanggil model input data(tambah)
		//Proses cek Query
		if ($masuk) {
			//Jika Data Masuk
			redirect('Dsn/msg/0');
		}
		else{			
			//Jika Data Tidak Masuk
			redirect('Dsn/msg/1');
		}
		}
	else{
			redirect('login');
		}

	}	
	public function del($data){
		//Cek Login
		if ($this->session->log_stat == True) {				
// 		@$nip = $data; 
		@$where = array('nip' => $data);		// where nip => data yang diambil
		@$hapus = $this->crud->delete($where,'dosen');	// Delete memanggil model delete , dosen = nama tabel
		if ($hapus) {
			redirect('Dsn/msg/2');
		}
		else {
			redirect('Dsn/msg/3');
		}
		}
	else{
			redirect('login');
		}
	}	
	public function edt(){		
		if ($this->session->log_stat == True) {
		@$nip = $this->input->post('data');		
		@$where = array('nip' => $nip);
		@$data['dsn'] = $this->crud->edit($where,'dosen')->row();
		$this->load->view('dosen/edit', $data);		
		}
	else{
			redirect('login');
		}
	}	
	public function upd(){	
	if ($this->session->log_stat == True) {						
		@$data = array(
				'nip' => preg_replace('/[^a-zA-Z0-9]/', '',$this->input->post('nip')),
				'namadsn' => htmlspecialchars($this->input->post('nama'), ENT_QUOTES),	
				'alamat' => htmlspecialchars($this->input->post('alamat'), ENT_QUOTES),
				'tgl' => $this->input->post('tgl'),
				'jk' => $this->input->post('jk'),
		);
		@$where = array(
				'nip' => $this->input->post('nip')
				);
		@$update = $this->crud->update($where,$data,'dosen');
		if ($update){
			redirect('Dsn/msg/4');
		}
		else {
			redirect('Dsn/msg/5');
		}
		}
	else{
			redirect('login');
		}
	}	
	public function msg($a){
		if ($this->session->log_stat == True) {					
		$data['hasil'] = $this->crud->tampil('dosen')->result();
		$data['page'] = 'Show';	
		$data['tabel'] = 'dosen/show';	
		$data['edit'] = 'Dsn/edt/';
		$data['del'] = 'Dsn/del/';		
		$data['base'] = 'Dsn/';			
		$data['jdl'] = 'Data Dosen';
		$data['input'] = 'Dsn/input';
		$data['dsn'] = 'active';				
		$data['msg'] = $a;					
		$this->load->view('dashboard',$data);		
		}
	else{
			redirect('login');
		}
	}
}
?>
