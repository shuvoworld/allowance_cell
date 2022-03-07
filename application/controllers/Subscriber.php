<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->data['page_title'] = 'Subscriber';
		$this->load->model('subscriber_model');
		$this->load->library('grocery_CRUD');
	}

	public function subscribers_management() {
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('study_circle');
		$crud->columns('subscription_number', 'name', 'contact_no', 'national_id_no', 'bkash_ref_no', 'occupation', 'created_at');
		//$crud->set_relation('officeCode', 'offices', 'city');
		$crud->change_field_type('created_at', 'invisible')
                ->change_field_type('ticket_number', 'invisible');

		$crud->display_as('name', 'Name');
		$crud->display_as('contact_no', 'Mobile');
		$crud->display_as('national_id_no', 'Valid Photo ID No');
		$crud->display_as('bkash_ref_no', 'Transaction ID');
		$crud->set_subject('Subscriber');
		$crud->unset_edit();
		$crud->unset_delete();
		//$crud->set_field_upload('file_url', 'assets/uploads/files');

		$output = $crud->render();
		$output->page_title = "Subscriber Database";
		$this->render('subscriber.php', (array) $output);

	}
}