<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
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
	        'students' 	=> $this->student_model->get_students()
		);

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('student/index', $data);
		$this->load->view('footer');
	}

	/**
	 * Update Page for this controller.
	 */
	public function update($id)
	{
		$this->load->view('header');
		$this->load->view('sidebar');

        $this->form_validation->set_rules('DOB', 'Date of Birth', 'required');
  	    $this->form_validation->set_rules('Address', 'Address', 'required|min_length[3]|max_length[20]');

		if ($this->form_validation->run() == FALSE)
        {
        	$student = $this->student_model->get_details_by_id($id);
			$data = array(
				'user_id' => $id,
				'student_name' => $student['name'],
				'student'=> $student['details']				
			);
        	$this->load->view('student/update', $data);
        	$this->load->view('footer');
        }else
        {
        	$this->student_model->update();
        	$this->session->set_flashdata('msg','The update has been done successfully.');
			redirect("student/index");	
        }
	}
}


