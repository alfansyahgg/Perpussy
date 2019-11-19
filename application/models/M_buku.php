<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	function __construct(){
		parent::__construct();
		 $this->load->library('pagination');
	}

	function getDataBuku(){

		$query = "SELECT * FROM tb_buku LIMIT 0,6";
	    $data['buku'] = $this->db->query($query)->result();
	    
	    return $data;
	}

	function getDataBukuAll(){

		$query = "SELECT * FROM tb_buku";
	    $data = $this->db->query($query)->result();
	    
	    return $data;
	}

	function getDataMore($id_last){
		$query = "SELECT * FROM tb_buku WHERE id > '$id_last' LIMIT 3 ";
		return $this->db->query($query)->result();
	}

	function addBuku($data){
		$this->db->insert('tb_buku',$data);
		return $this->db->affected_rows();
	}

	function deleteBuku($id){
		$this->db->where('id',$id);
		$this->db->delete('tb_buku');
	}

	function getDataBukuById($id){
		$this->db->where('id',$id);
		return $this->db->get('tb_buku')->result();
	}

	function getLastNoBuku(){
		$sql = "SELECT MAX(no_buku) as no_buku FROM tb_buku";
		return $this->db->query($sql)->result();
	}

	function updateBuku($id,$data){
		$this->db->where('id',$id);
		$this->db->update('tb_buku',$data);
		return $this->db->affected_rows();
	}
}
