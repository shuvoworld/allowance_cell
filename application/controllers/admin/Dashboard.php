<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Base_Controller {

	function __construct() {
		parent::__construct();
		$this->data['page_title'] = 'Dashboard';
		$this->load->model('Beneficiary_model');
	}

	public function index() {
		if (!$this->ion_auth->is_admin()) {
			$this->toastr->error('You do not have permission to see administrator dashboard');
			redirect($_SERVER['HTTP_REFERER']);
		}
		// $this->data['approved'] = $this->Beneficiary_model->approved();
        // $this->data['rejected'] = $this->Beneficiary_model->rejected();
        // $this->data['pending'] = $this->Beneficiary_model->pending();
        $this->data['all'] = $this->Beneficiary_model->all();
		$this->data['title'] = 'Dashboard';
		$this->data['breadcrumbs'] = 'Dashboard';
		$this->load->view('admin/dashboard_view', $this->data);

	}

}