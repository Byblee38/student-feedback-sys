<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('AdminModel', 'adminmodel');
    }

     public function index(){
        $data['menu'] = "m4";
        $data['view'] = 'page/admin_view';
        $data['data'] = $this->adminmodel->read_all();
        $this->load->view('template', $data);
    }

    public function add(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->adminmodel->add($data);
        redirect('admin');
    }

    public function edit(){
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->adminmodel->edit($id, $data);
        redirect('admin');
    }

    public function delete($id){
        $this->adminmodel->delete($id);
        redirect('admin');
    }

}