<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('KategoriModel', 'model');
    }

    public function index(){
        $data['menu'] = "m2";
        $data['view'] = 'page/kategori_view';
        $data['data'] = $this->model->read_all();
        $this->load->view('template', $data);
    }

    public function add(){
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->model->add($data);
        redirect('kategori');
    }

    public function edit(){
        $id = $this->input->post('id');
        $data = array(
            'nama_kategori' => $this->input->post('nama'),
        );
        $this->model->edit($id, $data);
        redirect('kategori');
    }

    public function delete($id){
        $this->model->delete($id);
        redirect('kategori');
    }

}