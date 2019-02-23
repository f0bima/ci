<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model{
	public function tampil($table){		
		return $this->db->get($table);
	}
	public function tambah($table, $data){
		$input = $this->db->insert($table, $data);		
		if (!$input) {
			return  false;
		}
		else  {
			return  true;
		}
	}

	public function delete($where,$table){
		@$a = $this->db->where($where);
		@$b = $this->db->delete($table);
		if ($a && $b) {
			return  true;
		}
		else  {
			return  false;
		}
	}

	public function update($where, $data, $table){		
		@$a = $this->db->where($where);
		@$b = $this->db->update($table,$data);
		if ($a && $b) {
			return  true;
		}
		else  {
			return  false;
		}
	}

	public function edit($where,$table){
		return $this->db->get_where($table,$where);
	}
}
?>