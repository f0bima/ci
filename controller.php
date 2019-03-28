public function cek($id){
    // url ..../<nama controller>/<id>
		@$where = array('<field id>' => $id);
		@$data['terserah'] = $this->crud->edit($where,'nama table')->row();
		$this->load->view('queryview',$data);		
}
