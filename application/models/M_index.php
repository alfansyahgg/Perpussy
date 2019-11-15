<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_index extends CI_Model {

	public function loginDetail($username,$password)
	{
		$where = "username = '$username' AND password = '$password' ";
		$this->db->where($where);
		$result = $this->db->get('tb_user')->result_array();
		// echo "<pre>";
		// var_dump($result);exit();
		if(!empty($result)){
				if($result[0]['status'] == '1' ){
				return "admin";
			}elseif ($result[0]['status'] == '0') {
				return "user";
			}
		}else{
			return 'gagal';
		}
		
	}
}
