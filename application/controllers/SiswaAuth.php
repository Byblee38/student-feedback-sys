<?php
class SiswaAuth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('SiswaModel', 'model');
    }

    public function index() {
        $this->load->view('page/login_siswa');
    }

    public function login_action() {
        $nis = $this->input->post('nis');
        $kelas = $this->input->post('kelas');
        $result = $this->model->login($nis, $kelas);

        if($result) {
            $session_data = array(
                'id' => $result->nis,
                'nama' => $result->nama,
                'role' => 2,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data); // Menyimpan session
            redirect('pelaporan');
        } else {
            redirect('SiswaAuth');
        }
    }

    public function logout() {
        $this->session->sess_destroy(); // Menghapus session
        redirect('SiswaAuth');
    }
}