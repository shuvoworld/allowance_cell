<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends Admin_Base_Controller {

	function __construct() {
		parent::__construct();
		$this->data['page_title'] = 'User Group';
		$this->load->model('group_model');
	}

	public function index() {
		$groups_data = $this->group_model->getAllGroups();
		$this->data['groups_data'] = $groups_data;
		$this->load->view('groups/index', $this->data);

	}

	public function create() {

		$this->form_validation->set_rules('name', 'Group name', 'required');
		if ($this->form_validation->run() == TRUE) {
			// true case
			$permission = serialize($this->input->post('permission'));

			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
			);

			$create = $this->ion_auth->create_group($this->input->post('name'), $this->input->post('description'), $permission);

			if ($create == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				redirect('Group/create', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('Group/create', 'refresh');
			}
		} else {
			// false case
			$this->load->view('groups/create', $this->data);
		}
	}

	/*
		* If the validation is not valid, then it redirects to the edit group page
		* If the validation is successfully then it updates the data into the database
		* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function edit($id = null) {

		// if (!in_array('updateGroup', $this->permission)) {
		// 	redirect('dashboard', 'refresh');
		// }

		if ($id) {

			$this->form_validation->set_rules('name', 'Group name', 'required');

			if ($this->form_validation->run() == TRUE) {
				// true case
				$permission = serialize($this->input->post('permission'));

				$data = array(
					'description' => $this->input->post('description'),
					'permission' => $permission,
				);

				$update = $this->ion_auth->update_group($id, $this->input->post('name'), $data);

				if ($update == true) {
					$this->session->set_flashdata('success', 'Successfully updated');
					redirect('Group/', 'refresh');
				} else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('Group/edit/' . $id, 'refresh');
				}
			} else {
				// false case
				$group_data = $this->group_model->getGroupData($id);
				//print_r($group_data);die();
				$this->data['group_data'] = $group_data;
				$this->load->view('groups/edit', $this->data);
			}
		}
	}

}
