<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aspirasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('AspirasiModel', 'model');
        $this->load->model('KategoriModel', 'kategorimodel');
    }


    public function index()
    {
        $data['menu'] = "m1";
        $data['view'] = 'page/aspirasi_view';
        $data['data'] = $this->model->read_all();
        $data['kategori'] = $this->kategorimodel->read_all();
        $this->load->view('template', $data);
    }

    public function add()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $data = array(
            'id_pelaporan' => $this->input->post('id_pelaporan'),
            'tanggal' => $tanggal,
            'feedback' => $this->input->post('feedback'),
            'status' => $this->input->post('status'),
        );
        $this->model->add_aspirasi($data);
        redirect('aspirasi/detail/' . $this->input->post('id_pelaporan'));
    }

    public function test()
    {
        echo date('Y-m-d');
    }

    public function detail($id)
    {
        $data['menu'] = "m1";
        $data['view'] = 'page/aspirasi_detail_view';
        $data['data'] = $this->model->read_by_id($id);
        $data['aspirasi'] = $this->model->read_aspirasi($id);
        $data['kategori'] = $this->kategorimodel->read_all();
        $this->load->view('template', $data);
    }
}
