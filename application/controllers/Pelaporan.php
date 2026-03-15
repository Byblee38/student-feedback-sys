<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('PelaporanModel', 'model');
		$this->load->model('KategoriModel', 'kategorimodel');
	}


	public function index()
	{
		if (
			$this->session->userdata('logged_in') == true && $this->session->userdata('role') == 2
		) {
			$data['menu'] = "m5";
			$data['view'] = 'page/pelaporan_view';
			$data['data'] = $this->model->read_all();
			$data['title'] = "Pelaporan";
			$data['kategori'] = $this->kategorimodel->read_all();
			$this->load->view('template', $data);
		} else {
			redirect('AdminAuth');
		}
	}

	public function add()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$data = array(
			'nis' => $this->input->post('nis'),
			'id_kategori' => $this->input->post('kategori'),
			'lokasi' => $this->input->post('lokasi'),
			'ket' => $this->input->post('keterangan'),
			'tanggal' => $tanggal
		);
		$this->model->add($data);
		redirect('pelaporan');
	}

	public function test()
	{
		echo date('Y-m-d');
	}

	public function detail($id)
	{
		$data['menu'] = "m5";
		$data['view'] = 'page/pelaporan_detail_view';
		$data['data'] = $this->model->read_by_id($id);
		$data['title'] = "Pelaporan";
		$data['aspirasi'] = $this->model->read_aspirasi($id);
		$data['kategori'] = $this->kategorimodel->read_all();
		$this->load->view('template', $data);
	}
}
