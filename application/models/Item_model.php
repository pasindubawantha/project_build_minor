<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model
{
	public function get_all_items()
	{
		$query = $this->db->get('item');
		return $query->result();
	}

	public function new_item($description)
	{
		$query = $this->db->insert('item', array('name' => $description));
		if($this->db->affected_rows() == 1)
		{
			return array('status'=>1 , 'message'=>'Successfully added the item');
		}
		else
		{
			return array('status'=>0 , 'message'=>'Failed to add the item');
		}
	}
}

