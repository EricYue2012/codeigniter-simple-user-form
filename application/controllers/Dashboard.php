<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		if(!isset($_SESSION)) 
		{ 
		    session_start(); 
		} 
		
		if(($this->input->post('username') == 'admin') && ($this->input->post('password') == 'boltpass'))
		{
			$this->setup_login();
			redirect('user/index');
		}else
		{
			$this->load->view('login-header');;
			$this->load->view('dashboard/index');
			$this->load->view('footer');
		}
	}

	public function logout(){
		$_SESSION['login'] = false;
		redirect('dashboard/index');
	}

	private function setup_login(){
		$_SESSION['login'] = true;
	}
}
