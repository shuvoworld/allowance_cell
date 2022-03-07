<?php
defined('BASEPATH') or exit('No direct script access allowed');
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';

use GroceryCrud\Core\GroceryCrud;

class Testimonial extends Admin_Base_Controller {
	function __construct() {
		parent::__construct();
		$this->data['page_title'] = 'Testimonial';
		$this->load->model('Testimonial_model');
		$this->setTemplateFile('grocery_view');

	}

	private function _getDbData() {
		$db = [];
		include APPPATH . 'config/database.php';
		return [
			'adapter' => [
				'driver' => 'Pdo_Mysql',
				'host' => $db['default']['hostname'],
				'database' => $db['default']['database'],
				'username' => $db['default']['username'],
				'password' => $db['default']['password'],
				'charset' => 'utf8',
			],
		];
	}

	private function _getGroceryCrudEnterprise($bootstrap = true, $jquery = true) {
		$db = $this->_getDbData();
		$config = include APPPATH . 'config/gcrud-enterprise.php';
		$groceryCrud = new GroceryCrud($config, $db);
		return $groceryCrud;
	}

	public function testimonial_management() {
		$crud = $this->_getGroceryCrudEnterprise();
		$crud->setTable('website_testimonials');
		$crud->setSubject('Testimonial');
		$crud->unsetJquery();
		$crud->fields(['name', 'name_designation', 'office_name', 'date', 'image', 'is_published']);
		$crud->columns(['name', 'name_designation', 'office_name', 'date', 'is_published']);
		$crud->displayAs('name', 'টাইটেল');
		$crud->displayAs('name_designation', 'নাম ও পদবী');
		$crud->displayAs('office_name', 'কার্যালয়');
		$crud->displayAs('date', 'তারিখ');
		$crud->displayAs('image', 'ছবি');
		$crud->setFieldUpload('image', 'assets/uploads/testimonials', base_url() . 'assets/uploads/testimonials');

		if (!in_array('viewTestimonial', $this->permission)) {
			$crud->unsetRead();
			$this->toastr->error('You do not have view permission');
			redirect('admin/dashboard', 'refresh');
		}
		if (!in_array('updateTestimonial', $this->permission)) {
			$crud->unsetEdit();
			$this->toastr->error('You do not have edit permission');
		}
		if (!in_array('deleteTestimonial', $this->permission)) {
			$crud->unsetDelete();
			$this->toastr->error('You do not have delete permission');
		}
		if (!in_array('createTestimonial', $this->permission)) {
			$crud->unsetAdd();
			$crud->unsetClone();
			$this->toastr->error('You do not have create permission');
		}

		$stateParameters = (object) [
			'insertId' => '1234',
		];

		$crud->callbackAfterInsert(function ($stateParameters) {
			$this->db->where('id', $stateParameters->insertId);
			$recommender = $this->db->get('website_testimonials')->row();

			//print_r($recommender); die();
			$this->db->update('website_testimonials', array(
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->ion_auth->user()->row()->id,
			));
			return $stateParameters;
		});

		$output = $crud->render();
		$this->_testimonial_output($output);
	}

	function _testimonial_output($output = null) {
		if (isset($output->isJSONResponse) && $output->isJSONResponse) {
			header('Content-Type: application/json; charset=utf-8');
			echo $output->output;
			exit;
		}

		$this->load->view('testimonial.php', $output);
	}

}
