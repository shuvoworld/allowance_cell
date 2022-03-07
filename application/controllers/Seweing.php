<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	include(APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php');

	use GroceryCrud\Core\GroceryCrud;

	class Seweing extends Admin_Base_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->data['page_title'] = 'Seweing';
			$this->load->model('Seweing_model');
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

		public function Seweing_management()
		{
			$crud = $this->_getGroceryCrudEnterprise();
			$crud->setTable('seweings');
			$crud->setSubject('Seweing Beneficiary');
			$crud->setRelation('district_id', 'districts', 'name_BN');
			$crud->unsetBootstrap();
			$crud->unsetJquery();
			$crud->unsetJqueryUi();

			$crud->displayAs('name', "à¦†à¦¬à§‡à¦¦à¦¨à¦•à¦¾à¦°à§€à¦° à¦¨à¦¾à¦®");
			$crud->displayAs('father_name', 'à¦ªà¦¿à¦¤à¦¾à¦° à¦¨à¦¾à¦®');
			$crud->displayAs('mother_name', 'à¦®à¦¾à¦¤à¦¾à¦° à¦¨à¦¾à¦®');
			$crud->displayAs('husband_name', 'à¦¸à§à¦¬à¦¾à¦®à§€à¦° à¦¨à¦¾à¦® (à¦ªà§à¦°à¦¯à§‹à¦œà§à¦¯ à¦•à§à¦·à§‡à¦¤à§à¦°à§‡)');
			$crud->displayAs('identity_no', 'à¦ªà¦°à¦¿à¦šà§Ÿà¦ªà¦¤à§à¦° à¦¨à¦®à§à¦¬à¦°');
			$crud->displayAs('mobile_no', 'à¦®à§‹à¦¬à¦¾à¦‡à¦²');
			$crud->displayAs('district_id', 'à¦†à¦¬à§‡à¦¦à¦¨à¦•à¦¾à¦°à§€à¦° à¦œà§‡à¦²à¦¾');
			$crud->displayAs('address', 'à¦†à¦¬à§‡à¦¦à¦¨à¦•à¦¾à¦°à§€à¦° à¦ à¦¿à¦•à¦¾à¦¨à¦¾');
            $crud->columns(['name', 'father_name', 'mother_name', 'identity_no', 'mobile_no', 'updated_at']);

			
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
				$recommender = $this->db->get('seweings')->row();

				//print_r($recommender); die();
				$this->db->update('seweings', array(
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'updated_by' => $this->ion_auth->user()->row()->id,
				));
				$curl = curl_init();

				curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api.sms.net.bd/sendsms',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POSTFIELDS => array('api_key' => 'nlJ8IH5d71i7u0Dn25hw9DkFIX2aeYQZ7O1Q47Aa','msg' => 'Test','to' => '8801675000148'),
				));

				$response = curl_exec($curl);

				curl_close($curl);
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
