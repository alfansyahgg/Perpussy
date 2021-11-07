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

		$data = [];

		if(!empty($result)){
				if($result[0]['status'] == '1' ){
				$data['status'] = 'admin';
				$data['id']		= $result[0]['id'];
			}elseif ($result[0]['status'] == '0') {
				$data['status'] = 'user';
				$data['id']		= $result[0]['id'];
			}
		}else{
			$data['status'] = 'gagal';
		}

		return $data;
		
	}
}
