<?php
class Studycircle_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	public function create($data) {
		if ($data) {
			$insert = $this->db->insert('study_circle', $data);
			return ($insert == true) ? true : false;
		}
	}
}