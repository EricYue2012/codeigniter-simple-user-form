<?php

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
    }


    public function index()
    {
        echo "model index";
    }

    public function update()
    {
        $data = array(
            'name'        => $this->input->post('name'),
            'status'      => $this->input->post('status'),
            'description' => $this->input->post('description'),
            'field_type'  => $this->input->post('field_type'), 
            'mandatory'   => $this->input->post('mandatory'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
    }

    public function create()
    {
        $this->load->helper('url');
        $data = array(
            'name'        => $this->input->post('name'),
            'status'      => $this->input->post('status'),
            'description' => $this->input->post('description'),
            'field_type'  => $this->input->post('field_type'), 
            'mandatory'   => $this->input->post('mandatory'),
        );
        return $this->db->insert('users', $data);
    }

    public function get_details_by_id($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.id',$id);
        return $this->db->get()->result();
    }

    public function get_field_types(){
        $this->db->select('*');
        $this->db->from('field_types');
        return $this->db->get()->result();
    }

    public function delete_by_id($id){
        $this->db->where('id', $id);   
        $this->db->delete('users');
    }
}
