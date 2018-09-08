<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$data = array(
	        'title'		=> 'Users | index',
	        'users' 	=> $this->db->get('users', 10)->result()
		);

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('user/index', $data);
		$this->load->view('footer');
	}

	/**
	 * Update Page for this controller.
	 */
	public function update($id)
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
        {
        	$user_details = $this->user_model->get_details_by_id($id);
			$data = array(
				'user'=> $user_details
			);

			$this->load->view('user/update', $data);
			$this->load->view('footer');
        }else
        {
        	$this->user_model->update();
        	$this->session->set_flashdata('msg','The update has been done successfully.');
			redirect("user/index");	
        }
	}

	/**
	 * Edit Page for this controller.
	 */
	public function create()
	{
		$this->load->view('header');
		$this->load->view('sidebar');

		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required',
            array('required' => 'You must provide a %s.')
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('user/create');
            $this->load->view('footer');
        }
        else
        {
    		$this->user_model->create();
            redirect('user/index');
        }
	}

	/**
	 * Delete Page for this controller.
	 */
	public function delete($id)
	{
		if(is_null($id)){
			$this->session->set_flashdata('msg','No user selected');

		}else{
			$this->user_model->delete_by_id($id);
			$this->session->set_flashdata('msg','The selected user has been deleted successfully.');
		}
		redirect("user/index");
	}
}


