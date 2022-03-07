<?php

class Location_model extends CI_model
{

	public function __construct()
	{
		parent::__construct();
	}

	function fetch_division()
	{
		$this->db->order_by("id", "ASC");
		$query = $this->db->get("divisions");
		return $query->result();
	}

	function fetch_district($division_id)
	{
		$this->db->where('division_id', $division_id);
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get('districts');
		$output = '<option value="">Select Districts</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->name_BN . '</option>';
		}
		return $output;
	}

	function fetch_upazila($district_id)
	{
		$this->db->where('district_id', $district_id);
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get('upazilas');
		$output = '<option value="">Select Upazila</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->name_BN . '</option>';
		}
		return $output;
	}
}
