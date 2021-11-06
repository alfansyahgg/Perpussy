<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Buku extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_index');
        $this->load->model('M_buku');
        $this->load->library('upload');
	}

	public function index()
	{
        $data['nama']     = $this->session->username;
        $data['tabelBuku'] = $this->M_buku->getDataBukuAll();
        // echo "<pre>";print_r($data['tabelBuku']);exit();

		 if($this->session->logged_in != TRUE){
            $this->load->view('V_Login');
        }else{
            $this->load->view('V_Header',$data);
						$this->load->view('V_Sidebar',$data);
						$this->load->view('Buku/V_TabelBuku',$data);
						$this->load->view('V_Footer',$data);
        }
    }

    function getDataBukuAll(){

        $data['tabelBuku'] = $this->M_buku->getDataBukuAll();
        echo json_encode($data['tabelBuku']);
    }

    function windowTambahBuku(){
			if ($this->session->status != 'admin') {
				echo '<pre>';print_r('prohibited');exit();
			}
        $data['nama']        = $this->session->username;
        $data['NoBuku']      = $this->M_buku->getLastNoBuku()[0];
        if($this->session->logged_in != TRUE){
            $this->load->view('V_Login');
        }else{
            $this->load->view('V_Header',$data);
			$this->load->view('V_Sidebar',$data);
			$this->load->view('Buku/V_TambahBuku',$data);
			$this->load->view('V_Footer',$data);
        }
    }

    function tambahBuku(){
				if ($this->session->status != 'admin') {
					echo '<pre>';print_r('prohibited');exit();
				}
        $covername          = $_FILES['file']['name'];
        $config['upload_path'] = './assets/images/buku/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $covername;
        $config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('file') ){
           echo $this->upload->display_errors();exit();
        }

        $no_buku            = $this->input->post('no_buku');
        $judul_buku         = $this->input->post('judul_buku');
        $keterangan_buku    = $this->input->post('ket_buku');
        $sinopsis_buku      = $this->input->post('sinopsis_buku');
        $pengarang          = $this->input->post('pengarang');
        $tanggal_rilis      = $this->input->post('tanggal_rilis');

        $data = array(
            'no_buku'               => $no_buku,
            'judul_buku'            => $judul_buku,
            'keterangan_buku'       => $keterangan_buku,
            'sinopsis_buku'         => $sinopsis_buku,
            'pengarang'             => $pengarang,
            'tanggal_rilis'         => $tanggal_rilis,
            'cover_buku'            => $covername
        );
        $add = $this->M_buku->addBuku($data);
        if($add > 0)
        {
            $this->session->set_flashdata('tambah','berhasil');
        }else{
            $this->session->set_flashdata('tambah','gagal');
        }

        redirect('C_Buku');
    }

    function hapusBuku(){
				if ($this->session->status != 'admin') {
					echo '<pre>';print_r('prohibited');exit();
				}
        $id = $this->input->post('id');
        $hapus = $this->M_buku->deleteBuku($id);
    }

    function windowEditBuku($id){
				if ($this->session->status != 'admin') {
					echo '<pre>';print_r('prohibited');exit();
				}
        $data['detailBuku'] = $this->M_buku->getDataBukuById($id);
        // echo "<pre>";
        // print_r($data['detailBuku']);exit();

        if($this->session->logged_in != TRUE){
            $this->load->view('V_Login');
	        }else{
	            $this->load->view('V_Header',$data);
							$this->load->view('V_Sidebar',$data);
							$this->load->view('Buku/V_EditBuku',$data);
							$this->load->view('V_Footer',$data);
	        }
    }

    function updateBuku($id){
				if ($this->session->status != 'admin') {
					echo '<pre>';print_r('prohibited');exit();
				}
        $covername          = $_FILES['file']['name'];
        $data['detailBuku'] = $this->M_buku->getDataBukuById($id);
        if($covername == ""){
            foreach($data['detailBuku'] as $detail){
                $covername = $detail->cover_buku;
            }
        }else{
            $covername     = $_FILES['file']['name'];
        }
        $no_buku            = $this->input->post('no_buku');
        $judul_buku         = $this->input->post('judul_buku');
        $keterangan_buku    = $this->input->post('ket_buku');
        $sinopsis_buku      = $this->input->post('sinopsis_buku');
        $pengarang          = $this->input->post('pengarang');
        $tanggal_rilis      = $this->input->post('tanggal_rilis');

        $data = array(
            'no_buku'               => $no_buku,
            'judul_buku'            => $judul_buku,
            'keterangan_buku'       => $keterangan_buku,
            'sinopsis_buku'         => $sinopsis_buku,
            'pengarang'             => $pengarang,
            'tanggal_rilis'         => $tanggal_rilis,
            'cover_buku'            => $covername
        );

        // echo "<pre>";
        // print_r($data);exit();

        $update = $this->M_buku->updateBuku($id,$data);

        redirect('C_Buku');
    }

    function lihatBuku($id){
        $data['detailBuku'] = $this->M_buku->getDataBukuById($id);
        if($this->session->logged_in != TRUE){
            $this->load->view('V_Login');
        }else{
            $this->load->view('V_Header',$data);
			$this->load->view('V_Sidebar',$data);
			$this->load->view('Buku/V_LihatBuku',$data);
			$this->load->view('V_Footer',$data);
        }
    }

}
