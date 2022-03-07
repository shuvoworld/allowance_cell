<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Registration';
        $this->load->model('Member_model');
        $this->load->model('Location_model');
        $this->load->model('Designation_model');
		$this->load->model('Payscale_model');
        $this->load->model('Ministry_model');
        $this->load->model('Department_model');
        $this->load->model('Appointmenttype_model');
		$this->load->model('Balance_model');
        $this->load->model('Helper_model');
		$this->load->library('ion_auth');
    }

    public function newmember() {
		$this->data['designations'] = $this->Designation_model->fetch_designation();
		$this->data['ministries'] = $this->Ministry_model->fetch_ministry();
		$this->data['departments'] = $this->Department_model->fetch_department();
		$this->data['payscales'] = $this->Payscale_model->fetch_payscale();
		$this->data['appointmenttypes'] = $this->Appointmenttype_model->fetch_appointmenttype();

		$this->form_validation->set_rules('name', 'Applicant name', 'required');
		$this->form_validation->set_rules('name_BN', 'Applicant name', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|min_length[11]|max_length[11]|is_unique[members.mobile_no]');
		$this->form_validation->set_rules('nid', 'nid No', 'required|min_length[10]|max_length[17]|is_unique[members.nid]');
		$this->form_validation->set_rules('primary_email', 'Email', 'required|valid_email|is_unique[members.primary_email]');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('current_join_date', 'Current Join Date', 'required');
		$this->form_validation->set_rules('website_url', 'Website Address', 'required');
		$this->form_validation->set_rules('present_address', 'Present Address', 'required');

		if ($this->form_validation->run() == TRUE) {
			// Handle date field's default 0000-00-00 issue
			if (empty($this->input->post('dob'))) {
			$data['dob'] = null;
			}
			if (empty($this->input->post('current_join_date'))) {
			$data['current_join_date'] = null;
			}

			$data = array(
				'name' => $this->input->post('name'),
				'name_BN' => $this->input->post('name_BN'),
				'mobile_no' => $this->input->post('mobile_no'),
				'nid' => $this->input->post('nid'),
				'dob' => $this->input->post('dob'),
				'primary_email' => $this->input->post('primary_email'),
				'current_designation_id' => $this->input->post('current_designation_id'),
				'current_ministry_id' => $this->input->post('current_ministry_id'),
				'current_department_id' => $this->input->post('current_department_id'),
				'current_join_date' => $this->input->post('current_join_date'),
				'current_payscale_id' => $this->input->post('current_payscale_id'),
				'present_address' => $this->input->post('present_address'),
				'website_url' => $this->input->post('website_url'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'membership_status' => 1,
			);

			$data['current_designation_name'] = $this->Helper_model->name_from_id('designations', $this->input->post('current_designation_id'));
			$data['current_ministry_name'] = $this->Helper_model->name_from_id('ministries', $this->input->post('current_ministry_id'));
			$data['current_department_name'] = $this->Helper_model->name_from_id('departments', $this->input->post('current_department_id'));
			$data['current_payscale_name'] = $this->Helper_model->name_from_id('payscales', $this->input->post('current_payscale_id'));


			$create = $this->Member_model->create($data);
			if ($create == true) {
				$this->session->set_flashdata('success', 'You have been successfully registered. A confirmation email has been sent to your email address.');
				$username = $this->input->post('primary_email');
				$email = $this->input->post('primary_email');
				$password = $this->input->post('password');
				$group = array(2);
				$additional_data = array(
				'member_id' => $this->db->insert_id()
				);				
				$createuser = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
				$startbalance = array('member_id' => $additional_data['member_id'], 'balance' => 0, 'updated_at' => date('Y-m-d H:i:s'));
				$createbalance = $this->Balance_model->create($startbalance);
				$this->email->from('info@govtictofficers.org', 'govtictofficers.org');
				$this->email->to($email);
				$this->email->subject('New registration Successful');
				$this->email->message('Congratulations! You have Successfully registered. Please login the system using your email and password. After Payment your membership status will be updated by administrator.');
				$this->email->send();
				redirect('Registration/newmember', 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('Registration/newmember', 'refresh');
			}
		} else {
			// false case
			$this->load->view('registration', $this->data);
		}
	}

	public function success() {
		$this->load->view('registration_success', $this->data);
	}
  
	function fetch_department()
	{
    if ($this->input->post('ministry_id')) {
        echo $this->Department_model->fetch_department_for_select($this->input->post('ministry_id'));
    }
}

}
