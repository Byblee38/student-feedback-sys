<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('SiswaModel', 'siswamodel');
    }

     public function index(){
        $data['menu'] = "m3";
        $data['view'] = 'page/siswa_view';
        $data['data'] = $this->siswamodel->read_all();
        $this->load->view('template', $data);
    }

    public function add(){
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        );
        $this->siswamodel->add($data);
        redirect('siswa');
    }

    public function edit(){
        $old_nis = $this->input->post('old_nis');
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        );
        $this->siswamodel->edit($old_nis, $data);
        redirect('siswa');
    }

    public function delete($id){
        $this->siswamodel->delete($id);
        redirect('siswa');
    }

    public function api(){
        $data = $this->siswamodel->read_all();
        echo json_encode($data);
    }
}