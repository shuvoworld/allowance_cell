<?php
defined('BASEPATH') or exit('No direct script access allowed');
include(APPPATH . 'libraries/GroceryCrudEnterprise/autoload.php');

use GroceryCrud\Core\GroceryCrud;
use GroceryCrud\Core\Model;

class Payment extends Admin_Base_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = 'Payment';
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

	public function payment_management()
	{
		$crud = $this->_getGroceryCrudEnterprise();
		$crud->setTable('payments');

		$crud->setRelation('member_id', 'members', 'name_BN');
		$crud->setRelation('mode_id', 'paymentmodes', 'name_BN');
		$crud->setRelation('purpose_id', 'paymentpurposes', 'name_BN');

		// data Grid view fields
		$crud->columns(['member_id', 'purpose_id', 'amount', 'reference_no', 'date', 'mode_id', 'status', 'authority_comment', 'created_at', 'updated_at']);
		$crud->addFields(['member_id', 'purpose_id', 'amount', 'reference_no', 'date', 'mode_id', 'details', 'remarks']);
		$crud->editFields(['member_id', 'purpose_id', 'amount', 'reference_no', 'date', 'mode_id', 'details', 'remarks', 'status', 'authority_comment']);
		$crud->fieldType('status', 'dropdown_search', [
		'Pending' => 'Pending',
		'Approved' => 'Approved'
		]);
		$logged_in_user = $this->ion_auth->user()->row()->id;
		if ($this->ion_auth->in_group('member')) {
			$crud->where([
				'member_id' => $this->ion_auth->user()->row()->member_id
			]);

			$crud->callbackAddField('member_id', function ($fieldType, $fieldName) {
    		return '<input class="form-control" name="' . $fieldName . '" type="text" value="'.$this->ion_auth->user()->row()->member_id.'" readonly="readonly">';
		});


		}
		$crud->callbackEditField('authority_comment', function ($fieldValue, $primaryKeyValue, $rowData) {
			return '<textarea name="authority_comment" class="form-control" cols="40" rows="3" readonly>' . $fieldValue . '</textarea>';
		});

		$crud->setSubject('Payment');
		$crud->unsetJquery();
		if (!in_array('viewPayment', $this->permission)) {
		$crud->unsetRead();
		$this->toastr->error('You do not have view permission');
		redirect('admin/dashboard', 'refresh');
		}
		if (!in_array('updatePayment', $this->permission)) {
			$crud->unsetEdit();
			$this->toastr->error('You do not have edit permission');
		}
		if (!in_array('deletePayment', $this->permission)) {
			$crud->unsetDelete();
			$this->toastr->error('You do not have delete permission');
		}
		if (!in_array('createPayment', $this->permission)) {
			$crud->unsetAdd();
			$crud->unsetClone();
			$this->toastr->error('You do not have create permission');
		}

		// Update certain fields in DB after inserting the records - Grocery CRUD Implementation
		include (APPPATH . 'models/Payment_model.php');
		$db = $this->_getDbData();
		$Payment_model = new \Payment_Model($db);
		$crud->setModel($Payment_model);
		$stateParameters = (object)[
			'insertId' => '1234',
			'data' => [ // data to insert
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			]
		];
		$crud->callbackAfterInsert(function ($stateParameters) use ($Payment_model) {
    	$Payment_model->updateFieldsAfterCreate($stateParameters->insertId);
   	 	return $stateParameters;
		});
		
	$state = $crud->getState();
	$stateInfo = $crud->getStateInfo();
	

	if ($state  === 'EditForm') {
			$paymentId = $stateInfo->primaryKeyValue;
			$query = $this->db->query('SELECT * FROM payments where id = ' . $paymentId);
			$current_row = $query->row();

    if ($current_row->status == 'Approved') {
		$output = (object) [
		'isJSONResponse' => true,
		'output' => json_encode(
			(object) [
				'message' => 'It seems that you don\'t have access to edit this record. Payment already approved by authority..',
				'status' => 'failure',
			]
		),
	];
	$crud->unsetDelete();

    }
	else{
		$output = $crud->render();
	}

}
	else{
		$output = $crud->render();
	}
	  $this->_payment_output($output);
}

	function _payment_output($output = null)
	{
		if (isset($output->isJSONResponse) && $output->isJSONResponse) {
			header('Content-Type: application/json; charset=utf-8');
			echo $output->output;
			exit;
		}

		$this->load->view('payment.php', $output);
	}

	function getPaymentInfoOfMember($member_id=null)
	{
	   if ($member_id) {
            $sql = "SELECT * FROM payments where id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $sql = "SELECT * FROM payments ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
	}

}
