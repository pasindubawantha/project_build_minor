<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model
{
	public function get_user_data($user_id)
    {
        $this->db->where('active', '1');
        $this->db->where('id', $user_id);
        $query = $this->db->get('user');
        return $query->row_array();
    }
}
