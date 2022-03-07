<?php

class Admin_Base_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		$group_data = array();
		$this->load->library('ion_auth');
		$this->load->library('toastr');
		if (!$this->ion_auth->logged_in()) {
			redirect('index.php/auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();
		$group_data = $this->ion_auth->get_users_groups($user->id)->result();
		$this->data['user_permission'] = unserialize($group_data[0]->permission);
		$this->permission = unserialize($group_data[0]->permission);
	}

	protected function title( $title ) {
		$this->data['title'] = trim( $title );
	}

	
}