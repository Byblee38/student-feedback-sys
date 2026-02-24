<?php
class AdminAuth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('AdminModel', 'adminmodel');
    }

    public function index() {
        $this->load->view('page/login_view');
    }

    public function login_action() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->adminmodel->validate($username, $password);

        if($result) {
            $session_data = array(
                'id' => $result->id,
                'nama' => $result->nama,
                'role' => 1,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data); // Menyimpan session
            redirect('admin');
        } else {
            redirect('AdminAuth');
        }
    }

    public function logout() {
        $this->session->sess_destroy(); // Menghapus session
        redirect('AdminAuth');
    }
}