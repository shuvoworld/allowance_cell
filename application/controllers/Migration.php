<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{
    	function __construct() {
		parent::__construct();
		$this->load->library('ion_auth');
	}

    
	public function generateUserFromMember()
	{
		$query = $this->db->query("SELECT id, primary_email FROM members");

		foreach ($query->result() as $row)
		{
            $username = $row->primary_email;
          	$email =    $row->primary_email;
          	$password = '12345678';
            $additional_data = array(
                'member_id' => $row->id
            );
            $group = array('2');
    	if($this->ion_auth->register($username, $password, $email, $additional_data, $group))
		{
			echo "User created Succesfully\n";
		}
		}
	}
		public function message($to = 'World')
        {
                echo "Hello {$to}!".PHP_EOL;
        }

}