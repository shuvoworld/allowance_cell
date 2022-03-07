<?php

class Helper_model extends CI_model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_appointmenttype()
    {
        $query = $this->db->get("appointmenttypes");
        return $query->result();
    }

    public function name_from_id($table, $id)
    {
        if($id != 0 || $id != NULL)
        return $this->db->get_where($table, array('id' => $id))->row()->name_BN;
        else {
            return false;
        }
    }

}
