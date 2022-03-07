<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Base_Controller {

	function __construct() {
		parent::__construct();
		$this->data['page_title'] = 'User';
		$this->load->model('User_model');
		$this->load->model('Group_model');
		$this->load->model('Member_model');

	}

	public function index() {
		if (!in_array('viewUser', $this->permission)) {
			$this->toastr->error('You do not have view permission');
			redirect('admin/dashboard', 'refresh');
		}
		$this->load->view('users/index', $this->data);
	}

	public function fetchUserData() {
		$this->setOutputMode(NORMAL);
		$result = array('data' => array());

		$data = $this->User_model->getUserData();

		foreach ($data as $key => $value) {
			// button
			$buttons = '';
			if (in_array('updateUser', $this->permission)) {
				$buttons .= '<a href="' . base_url('User/edit/' . $value['id']) . '" class="btn btn-info btn-sm">Edit</a>&nbsp;';
			}

			if (in_array('deleteUser', $this->permission)) {
				$buttons .= "<a data-toggle='tooltip' class='btn btn-danger btn-sm delete'  id='" . $value['id'] . "' title='Delete'>Delete</a>";
			}

			$result['data'][$key] = array(
				$value['id'],
				$value['username'],
				$value['member_id'],
				$value['email'],
				$buttons,
			);
		} // /foreach

		echo json_encode($result);
	}

	public function create() {
		if (!in_array('createUser', $this->permission)) {
			$this->toastr->error('You do not have create permission');
			redirect('admin/dashboard', 'refresh');
		}
		$this->data['group'] = $this->Group_model->getAllGroups();
		$this->data['members'] = $this->Member_model->getMemberData();

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('group_id', 'Group', 'required');

		if ($this->form_validation->run() == TRUE) {

			$username = $this->input->post('email');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$additional_data = array(
				'member_id' => $this->input->post('member_id'),
			);
			$group = array($this->input->post('group_id'));

			$create = $this->ion_auth->register($username, $password, $email, $additional_data, $group);

			if ($create == true) {
				$this->toastr->success('Successfully created!');
				redirect('User/', 'refresh');
			} else {
				$this->toastr->error('Create failed!');
				redirect('User/create', 'refresh');
			}
		} else {
			// false case
			$this->load->view('users/create', $this->data);
		}
	}

	/*
		        * If the validation is not valid, then it redirects to the edit group page
		        * If the validation is successfully then it updates the data into the database
		        * and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function edit($id = null) {

		if (!in_array('updateUser', $this->permission)) {
			$this->toastr->error('You do not have update permission');
			redirect('admin/dashboard', 'refresh');
		}

		$this->data['group'] = $this->Group_model->getAllGroups();
		$this->data['members'] = $this->Member_model->getMemberData();

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('group_id', 'Group', 'required');

		if ($id) {

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'username' => $this->input->post('email'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'member_id' => $this->input->post('member_id'),
				);

				$update = $this->ion_auth->update($id, $data);

				$group = $this->input->post('group_id');
				$this->ion_auth->remove_from_group(NULL, $id);
				$this->ion_auth->add_to_group($group, $id);

				if ($update == true) {
					$this->session->set_flashdata('success', 'Successfully updated');
					redirect('User/', 'refresh');
				} else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('User/edit/' . $id, 'refresh');
				}
			} else {
				//false case
				$user_data = $this->User_model->getUserData($id);
				$this->data['user_data'] = $user_data;
				$this->load->view('users/edit', $this->data);

			}
		}
	}

	public function delete() {
		header("Content-type: application/json");
		$id = $this->input->post('id');
		$result = $this->ion_auth->delete_user($id);
		if ($result) {
			echo 'Deleted successfully';
		}
	}

}
