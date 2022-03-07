<?php

class Member_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMemberData($id = null)
    {
        if ($id) {
            $sql = "SELECT
    m.id,
	m.forum_membership_no,
	m.name_BN,
	m.mobile_no,
	m.primary_email,	
	m.current_designation_name,
	m.current_department_name,
	ms.name_BN AS membershipstatus 
FROM
	members AS m
	LEFT JOIN membership_status AS ms ON m.membership_status = ms.id where m.id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $sql = "SELECT
	m.id,
	m.forum_membership_no,
	m.name_BN,
	m.mobile_no,
	m.primary_email,	
	m.current_designation_name,
	m.current_department_name,
	ms.name_BN AS membershipstatus 
FROM
	members AS m
	LEFT JOIN membership_status AS ms ON m.membership_status = ms.id ORDER BY m.id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

	public function getMemberAllData($id = null)
	{
		if ($id) {
			$sql = "SELECT * from members WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM members ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function create($data)
    {
        if ($data) {
            $insert = $this->db->insert('members', $data);
            return ($insert == true) ? true : false;
        }
    }

    public function edit($data = array(), $id = null)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('members', $data);

        return ($update == true) ? true : false;
    }

    public function delete($id)
    {
        $result = $this->db->delete('members', array('id' => $id));
        return $result;
    }

    public function getMemberBalance($id)
    {
        $sql = "SELECT balance FROM balances where member_id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row_array();
    }
}
