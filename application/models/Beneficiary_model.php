<?php

class Beneficiary_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $query = $this->db->get("beneficiaries");
        return $query->result();
    }

	public function approved()
	{
		$query = $this->db->where('status', 'approved')->get("beneficiaries");
		return $query->result();
	}
    public function rejected()
    {
        $query = $this->db->where('status', 'rejected')->get("beneficiaries");
        return $query->result();
    }
    public function pending()
    {
        $query = $this->db->where('status', 'pending')->get("beneficiaries");
        return $query->result();
    }
}
