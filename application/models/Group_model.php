<?php

class Group_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function getGroupData($groupId = null) {
		$group = $this->ion_auth->group($groupId);
		return $group->result_array();
	}

	public function getAllGroups() {
		$group = $this->ion_auth->groups();
		return $group->result_array();
	}

	public function create($name, $description, $permission) {
		// Extend ion auth to save permission
		$create = $this->ion_auth->create_group($this->input->post('name'), $this->input->post('description'), $permission);
		return ($create == true) ? true : false;
	}

	public function edit($data, $id) {
		$this->db->where('id', $id);
		$update = $this->db->update('groups', $data);
		return ($update == true) ? true : false;
	}

}
