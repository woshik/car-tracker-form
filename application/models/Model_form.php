<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_form extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($emailContent)
    {
        $insert_data = array(
            'subject'     => htmlentities(trim($emailContent['subject'])),
            'body'       => htmlentities(trim($emailContent['body'])),
            'pdf'        => htmlentities(trim($emailContent['pdf'])),
        );

        $this->db->trans_start();

        $insert = $this->db->insert('car_tracking_form', $insert_data);

        $this->db->trans_complete();

        return $insert ? TRUE : FALSE;
    }

    public function fetch()
	{
        $this->db->select('*');
        $query = $this->db->get('car_tracking_form');
        return $query->result_array();
    }
    
    public function delete($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('car_tracking_form');
    }
}
