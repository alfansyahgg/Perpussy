<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Index extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_index');
        $this->load->model('M_buku');
	}

	public function index()
	{
        $data['nama']     = $this->session->username;
        $data['dataBuku'] = $this->M_buku->getDataBuku();
        // echo "<pre>";print_r($data['dataBuku']);exit();

		 if($this->session->logged_in != TRUE){
            $this->load->view('V_Login');
        }else{
            $this->load->view('V_Header',$data);
			$this->load->view('V_Sidebar',$data);
			$this->load->view('V_Index',$data);
			$this->load->view('V_Footer',$data);
        }
    }

    function login(){
    	$username 	= $this->input->post('username');
    	$password 	= $this->input->post('password');

    	$status		= $this->M_index->loginDetail($username,md5($password));
        // var_dump($status);exit();

    	if($status == "admin"){
    		$session = array('username' => $username, 'logged_in' => true,'status' => 'admin');
    		$this->session->set_userdata($session);
    		$this->session->unset_userdata('gagal');
            redirect('C_Index');
           
    	}elseif ($status == "user") {
            $session = array('username' => $username, 'logged_in' => true,'status' => 'user');
            $this->session->set_userdata($session);
            $this->session->unset_userdata('gagal');
            redirect('C_Index');
        }
        else{
    		$session = array('logged_in' => false, 'gagal' => 1);
    		$this->session->set_userdata($session);
    		redirect('C_Index');
        }
        
    }

    function logout(){
        $this->session->sess_destroy();
    	$session = array('gagal' => 1);
    	$this->session->set_userdata($session);
    	redirect('C_Index');
    }

    function admin(){
        $data['nama']     = $this->session->username;
        $data['dataBuku'] = $this->M_buku->getDataBuku();

        // echo $this->session->status;exit();
        if($this->session->logged_in != TRUE){
            $this->load->view('V_Login');
        }else{
            $this->load->view('V_Header',$data);
            $this->load->view('V_Sidebar',$data);
            $this->load->view('V_Main',$data);
            $this->load->view('V_Footer',$data);
        }
    }

    function getDataMore(){
        $id_last    = $this->input->get('id_last');
        $data       = $this->M_buku->getDataMore($id_last);

        $numOfCols = 3;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        $more = '';
        foreach ($data as $key => $dt) {
           $more .= '<div class="col-lg-'.$bootstrapColWidth.' col-content" data-id="'.$dt->id.'">';
           $more .= '<div class="col-lg-12 mb-4">';
           $more .= '<div class="card card-class">';
           $more .= '<center>';
           $more .= '<img style="height: 100%;width: 60%;" src='.base_url('assets/images/buku/').$dt->cover_buku.' class="card-img-top img-cover" alt='.$dt->judul_buku.'>';
           $more .= '</center>';
           $more .= '<div class="card-body">';
           $more .= '<h5 class="card-title"><a href='.base_url('C_Buku/lihatBuku/').$dt->id.'>'.$dt->judul_buku.'</a></h5>';
           $more .= '<p class="card-text">'.substr($dt->keterangan_buku,0,150).'...</p>';
           $more .= '<a href='.base_url("C_Buku/lihatBuku/").$dt->id.' class="btn btn-primary">Lihat Buku</a>';
           $more .= '</div>';
           $more .= '</div>';
           $more .= '</div>';
           $more .= '</div>';
        }
 
        echo $more;
    }
}
