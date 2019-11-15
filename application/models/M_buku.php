<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	function __construct(){
		parent::__construct();
		 $this->load->library('pagination');
	}

	function getDataBuku(){

		$query ="SELECT * FROM tb_buku";
	    $data['buku'] = $this->db->query($query)->result();
	    
	    return $data;
	}
}
