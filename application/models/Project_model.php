<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model
{
	public function get_projects_by_user($user_id)
	{
		$query = 'SELECT `id`,`name`,`address` from project as p JOIN team_member as t WHERE t.user_id = "'.$user_id.'" AND p.active = 1 ';
		$query = $this->db->query($query);
		return $query->result();
	}

	public function get_project_details($project_id)
	{
		$query = $this->db->get_where('project',array('id' => $project_id));
		return $query->row();
	}
}
