<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BOQ_model extends CI_Model
{
	public function process_cvs($project_id, $file_target, $description)
	{
		$file = fopen($file_target,"r");

		$this->db->trans_begin();

		$this->db->insert('boq', array('project_id'=>$project_id, 'description'=>addslashes($description)));
		$query = 'SELECT LAST_INSERT_ID() as result';
		$query = $this->db->query($query);
		$boq_id = $query->row()->result;

		$row_num = 0;
		ini_set('auto_detect_line_endings', true);
		while($row = fgetcsv($file))
		{
			$row_num++;
			switch($row[0])
			{
				case '#stage':
					$query = 'INSERT INTO boq_stage(boq_id, item_no, description) VALUES ('.$boq_id.', "'.addslashes($row[1]).'" , "'.addslashes($row[2]).'")';
					$this->db->query($query);
					$query = 'SELECT LAST_INSERT_ID() as result';
					$query = $this->db->query($query);
					$boq_stage_id = $query->row()->result;
					if ($this->db->trans_status() === FALSE || $row[1] == "" || $row[2] == "")
					{
				        $this->db->trans_rollback();
				        return array('success' => 0, 'message' => 'Failed to process file error in row : '.$row_num);
					}
					break;

				case '#item':
					$query = 'INSERT INTO boq_item(boq_stage_id, item_no, description, unit, quantity, rate) VALUES ('.$boq_stage_id.', "'.addslashes($row[1]).'" , "'.addslashes($row[2]).'", "'.addslashes($row[3]).'", '.number_format(((float)$row[4]),2,'.','' ).' , '.number_format(((float)$row[5]),2,'.','' ).' )';
					$this->db->query($query);
					if ($this->db->trans_status() === FALSE || $row[1] == "" || $row[2] == "" || $row[3] == "" || $row[4] == "" || $row[5] == "")
					{
				        $this->db->trans_rollback();
				        return array('success' => 0, 'message' => 'Failed to process file error in row : '.$row_num);
					}
					break;
			}
			if ($this->db->trans_status() === FALSE)
			{
		        $this->db->trans_rollback();
		        return array('success' => 0, 'message' => 'Failed to process file error in row : '.$row_num);
			}
		}

		fclose($file);

		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        return array('success' => 0, 'message' => 'Failed to process file error in row : '.$row_num);
		}
		else
		{
	        $this->db->trans_commit();
	        return array('success' => 1, 'message' => 'Successfully processed the file');
		}
	}
}
