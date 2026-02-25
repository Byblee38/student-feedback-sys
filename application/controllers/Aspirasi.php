<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspirasi extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('AspirasiModel', 'model');
    }

     public function index(){
        $data['menu'] = "m1";
        $data['view'] = 'page/aspirasi_view';
        $data['data'] = $this->model->read_all();
        $this->load->view('template', $data);
    }

    public function add(){
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        );
        $this->model->add($data);
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
        $this->model->edit($old_nis, $data);
        redirect('siswa');
    }

    public function delete($id){
        $this->model->delete($id);
        redirect('siswa');
    }

    public function api(){
        $data = $this->model->read_all();
        echo json_encode($data);
    }
}