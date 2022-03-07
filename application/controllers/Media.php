<?php
defined('BASEPATH') or exit('No direct script access allowed');
include APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php';

use GroceryCrud\Core\GroceryCrud;

class Media extends Admin_Base_Controller {
	function __construct() {
		parent::__construct();
		$this->data['page_title'] = 'Media';
		$this->load->model('Media_model');
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

	public function media_management() {
		$crud = $this->_getGroceryCrudEnterprise();
		$crud->setTable('website_mediacorners');
		$crud->setSubject('Media');
		$crud->unsetJquery();
		$crud->fields(['name', 'file', 'link', 'date', 'is_published']);
		$crud->columns(['name', 'date', 'is_published', 'archive_date']);
		$crud->displayAs('name', 'শিরোনাম');
		$crud->displayAs('media_name', 'পত্রিকা/মিডিয়ার নাম');
		$crud->displayAs('file', 'ফাইল আপলোড');
		$crud->displayAs('link', 'লিংক');
		$crud->displayAs('date', 'প্রকাশের তারিখ');
		$crud->displayAs('archive_date', 'আর্কাইভের তারিখ');		
		$crud->displayAs('is_published', 'প্রকাশিত?');
		$crud->setFieldUpload('file', 'assets/uploads/mediacorners', base_url() . 'assets/uploads/mediacorners');

		if (!in_array('viewMedia', $this->permission)) {
			$crud->unsetRead();
			$this->toastr->error('You do not have view permission');
			redirect('admin/dashboard', 'refresh');
		}
		if (!in_array('updateMedia', $this->permission)) {
			$crud->unsetEdit();
			$this->toastr->error('You do not have edit permission');
		}
		if (!in_array('deleteMedia', $this->permission)) {
			$crud->unsetDelete();
			$this->toastr->error('You do not have delete permission');
		}
		if (!in_array('createMedia', $this->permission)) {
			$crud->unsetAdd();
			$crud->unsetClone();
			$this->toastr->error('You do not have create permission');
		}

		$stateParameters = (object) [
			'insertId' => '1234',
		];

		$crud->callbackAfterInsert(function ($stateParameters) {
			$this->db->where('id', $stateParameters->insertId);
			$recommender = $this->db->get('website_mediacorners')->row();

			//print_r($recommender); die();
			$this->db->update('website_mediacorners', array(
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->ion_auth->user()->row()->id,
			));
			return $stateParameters;
		});

		$output = $crud->render();
		$this->_media_output($output);
	}

	function _media_output($output = null) {
		if (isset($output->isJSONResponse) && $output->isJSONResponse) {
			header('Content-Type: application/json; charset=utf-8');
			echo $output->output;
			exit;
		}

		$this->load->view('media.php', $output);
	}

}
