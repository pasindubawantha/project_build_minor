<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model
{
	public function get_role_access_data($role_id)
	{
		$query = $this->db->get_where('access_table', array('role_id' => $role_id));
		foreach($query->result() as $row)
		{
			$can_read = $row->access == '1'? true: false;
			$nice_rows[$row->object] = $can_read;
			switch($row->object)
			{
				case 'project':
					if($can_read) $apps['project'] = array('icon'=>'fa fa-fw fa-futbol-o', 'name'=>'Projects', 'controller_name'=>'Project');
					break;
				case 'inventory':
					if($can_read) $apps['inventory'] = array('icon'=>'fa fa-fw fa-cubes','name'=>'Inventory', 'controller_name'=>'Inventory');
					break;
				case 'user':
					if($can_read) $apps['user'] = array('icon'=>'fa fa-fw fa-users','name'=>'Users', 'controller_name'=>'User');
					break;
				case 'supplier':
					if($can_read) $apps['customer'] = array('icon'=>'fa fa-fw fa-shopping-cart','name'=>'Suppliers', 'controller_name'=>'Supplier');
					break;
				case 'contractor':
					if($can_read) $apps['vendor'] = array('icon'=>'fa fa-fw fa-shopping-cart','name'=>'Contractors', 'controller_name'=>'Contractor');
					break;
				case 'prn':
					if($can_read) $apps['prn'] = array('icon'=>'fa fa-fw fa-shopping-cart','name'=>'PRN', 'controller_name'=>'PRN');
				break;

			}
		}
		$ret = array('access'=>$nice_rows,'apps'=>$apps);


		return $ret;
	}

}
