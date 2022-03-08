<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	include(APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php');

	use GroceryCrud\Core\GroceryCrud;

	class Beneficiary extends Admin_Base_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->data['page_title'] = 'Beneficiary';
			$this->load->model('Beneficiary_model');
			$this->setTemplateFile('grocery_view');

		}

		private function _getDbData()
		{
			$db = [];
			include(APPPATH . 'config/database.php');
			return [
				'adapter' => [
					'driver' => 'Pdo_Mysql',
					'host' => $db['default']['hostname'],
					'database' => $db['default']['database'],
					'username' => $db['default']['username'],
					'password' => $db['default']['password'],
					'charset' => 'utf8'
				]
			];
		}

		private function _getGroceryCrudEnterprise($bootstrap = true, $jquery = true)
		{
			$db = $this->_getDbData();
			$config = include(APPPATH . 'config/gcrud-enterprise.php');
			$groceryCrud = new GroceryCrud($config, $db);
			return $groceryCrud;
		}

		public function beneficiary_management()
		{
			$crud = $this->_getGroceryCrudEnterprise();
			$crud->setTable('beneficiaries');
			$crud->setSubject('Beneficiary');
			$crud->setRelation('district_id', 'districts', 'name_BN');
			$crud->setRelation('upazila_id', 'upazilas', 'name_BN');
			$crud->setDependentRelation('upazila_id','district_id','district_id');
			$crud->unsetBootstrap();
			$crud->unsetJquery();

			$crud->displayAs('name', "আবেদনকারীর নাম");
			$crud->displayAs('father_name', 'পিতার নাম');
			$crud->displayAs('mother_name', 'মাতার নাম');
			$crud->displayAs('husband_name', 'স্বামীর নাম (প্রযোজ্য ক্ষেত্রে)');
			$crud->displayAs('dob', "জন্ম তারিখ");
			$crud->displayAs('identity_type', 'পরিচয়পত্রের ধরণ');
			$crud->displayAs('identity_no', 'পরিচয়পত্র নম্বর');
			$crud->displayAs('mobile_no', 'মোবাইল');
			$crud->displayAs('occupation', 'পেশা');
			$crud->displayAs('district_id', 'আবেদনকারীর জেলা');
			$crud->displayAs('upazila_id', 'আবেদনকারীর উপজেলা');
			$crud->displayAs('address', 'আবেদনকারীর ঠিকানা');
			$crud->displayAs('reason', 'কি কারণে সাহায্য প্রয়োজন');
			$crud->displayAs('updated_at', 'তথ্য পরিবর্তনের তারিখ');
			$crud->displayAs('created_at', 'তথ্য তৈরির তারিখ');
			$crud->displayAs('updated_by', 'ব্যবহারকারী');
            $crud->columns(['name', 'identity_no', 'mobile_no', 'district_id', 'upazila_id', 'reason', 'updated_at']);
			$crud->fieldType('identity_type', 'dropdown_search', [
				'1' => 'National ID',
				'2' => 'Birth Registration'
			]);

			$crud->fieldType('occupation', 'dropdown_search', [
				'0' => 'গৃহিণী',
				'1' => 'চাকুরীজীবী',
				'2' => 'বেকার',
				'3' => 'অন্যান্য'
			]);

			$crud->fieldType('reason', 'dropdown_search', [
				'study' => 'লেখাপড়া',
				'financial' => 'আর্থিক',
				'treatment' => 'চিকিৎসা'
			]);

			$crud->setTexteditor([]);
			
			if (!in_array('viewBeneficiary', $this->permission)) {
				$crud->unsetRead();
				$this->toastr->error('You do not have view permission');
				redirect('admin/dashboard', 'refresh');
			}
			if (!in_array('updateBeneficiary', $this->permission)) {
				$crud->unsetEdit();
				$this->toastr->error('You do not have edit permission');
			}
			if (!in_array('deleteBeneficiary', $this->permission)) {
				$crud->unsetDelete();
				$this->toastr->error('You do not have delete permission');
			}
			if (!in_array('createBeneficiary', $this->permission)) {
				$crud->unsetAdd();
				$crud->unsetClone();
				$this->toastr->error('You do not have create permission');
			}

			$stateParameters = (object)[
				'insertId' => '1234',
			];

			$crud->callbackAfterInsert(function ($stateParameters) {
				$this->db->where('id', $stateParameters->insertId);
				$recommender = $this->db->get('beneficiaries')->row();

				//print_r($recommender); die();
				$this->db->update('beneficiaries', array(
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'updated_by' => $this->ion_auth->user()->row()->id,
				));
				return $stateParameters;
			});


			$output = $crud->render();
			$this->_beneficiary_output($output);
		}

		function _beneficiary_output($output = null)
		{
			if (isset($output->isJSONResponse) && $output->isJSONResponse) {
				header('Content-Type: application/json; charset=utf-8');
				echo $output->output;
				exit;
			}

			$this->load->view('beneficiary.php', $output);
		}

	}
