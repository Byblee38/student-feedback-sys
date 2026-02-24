<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
    }

	 public function index()
	{
		$data['menu'] = "m1";
		$data['view'] = 'page/home';
		$this->load->view('template', $data);
	}

	public function profile()
	{
		$data['menu'] = "m2";
		 $data['view'] = 'page/profile';
		$this->load->view('template', $data);
	}

	public function gallery()
	{
		$data['menu'] = "m3";
		 $data['view'] = 'page/gallery';
		$this->load->view('template', $data);
	}

	public function user()
	{
		$data['menu'] = "m4";
		 $data['view'] = 'page/user';
		$this->load->view('template', $data);
	}
}
