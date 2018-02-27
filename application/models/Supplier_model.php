<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
	public function get_all_suppliers()
	{
		$query = $this->db->get('supplier');
		return $query->result();
	}
}
