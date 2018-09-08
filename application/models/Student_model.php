<?php

class Student_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function get_details_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $result = $this->db->get()->result();

        //var_dump($result);
        $user_name = $result[0]->name;

        $this->db->select('*');
        $this->db->from('user_details');
        $this->db->where('user_id',$id);
        $result = $this->db->get()->result();

        $student_details = array();
        foreach ($result as $key => $student) 
        {
            $student_details[$student->field_key] = $student->field_value;
        }

        $student = array(
            'name' => $user_name,
            'details' => $student_details
        );
        return $student;
    }

    public function get_students()
    {
        $this->db->select('*');
        $this->db->from('users');
        $users = $this->db->get()->result();

        $new_users = array();
        foreach ($users as $key => $user) 
        {
            $new_details = array();
            $studen_details = $this->student_model->get_student_details($user->id);
            foreach ($studen_details as $key => $single_detail) 
            {
                $new_details[$single_detail->field_key] = $single_detail->field_value;
            }

            $new_users[] = array(
                'id'            => $user->id,
                'name'          => $user->name,
                'status'        => $user->status,
                'description'   => $user->description,
                'field_type'    => $user->field_type,
                'mandatory'     => $user->mandatory,
                'details'       => $new_details
            );
        }
        return $new_users;
    }
    
    public function get_student_details($id)
    {
        //log_message('debug', 'LB function - student - get_student_details');
        $this->db->select('*');
        $this->db->from('user_details');
        $this->db->where('user_id', $id);
        return $this->db->get()->result(); 
    }

    public function update()
    {
        $this->save_key_value($this->input->post('user_id'), 'DOB', $this->input->post('DOB'));
        $this->save_key_value($this->input->post('user_id'), 'Address', $this->input->post('Address'));
    }

    private function save_key_value($user_id, $key, $value)
    {
        if(!is_null($value))
        {
            if($this->check_existing($user_id, $key, $value))
            {
                // record existing - update record
                $this->update_key_value($user_id, $key, $value);
            }else
            {
                // record not existing - insert record
                $this->insert_key_value($user_id, $key, $value);
            }    
        }
    }

    /**
    * check if record existing
    */
    private function check_existing($user_id, $key, $value)
    {
        $this->db->select('*');
        $this->db->from('user_details');
        $this->db->where('user_id', $user_id);
        $this->db->where('field_key', $key);
        $result = $this->db->get()->result(); 

        if(sizeof($result)> 0)
        {
            return true;
        }else
        {
            return false;
        }
    }

    /**
    * update existing record
    */
    private function update_key_value($user_id, $key, $value)
    {
        if(!empty($value))
        {
            // add quote on string before db query
            $value = "'" . $value . "'";

            // update db
            $this->db->set('field_value', $value, FALSE);
            $this->db->where('user_id', $user_id);
            $this->db->where('field_key', $key);
            $this->db->update('user_details');       
        }
    }

    /**
    * insert new record
    */
    private function insert_key_value($user_id, $key, $value)
    {
        //log_message('debug', 'LB function - student - insert_key_value');
        $data = array(
            'user_id' => $user_id,
            'field_key' => $key,
            'field_value' => $value
        );
        //log_message('debug', $key);
        //log_message('debug', $value);
        $this->db->insert('user_details', $data);
    }
}
