<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends Public_Controller
{
    function __construct() {
		parent::__construct();
		$this->data['page_title'] = 'Verification';
    }
    
    public function event_verification(){
        $this->form_validation->set_rules('ticket_number', 'Registration Number', 'required');

        if ($this->form_validation->run() == TRUE) {
            $ticket_number = $this->input->post('ticket_number');
            $query = $this->db->query("SELECT * FROM event_registration WHERE ticket_number = '$ticket_number' ");
            $row = $query->row_array();
            if (isset($row)) {
				$this->session->set_flashdata('success',  'You are registered with Us ' . $row['name'] . ' Your Contact No: '. $row['contact_no']);
				redirect('Verification/event_verification', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Error! You are not yet registered!');
				redirect('Verification/event_verification', 'refresh');
			}
        } 
        
        else {
			// false case
			$this->public_render('verification/event_registration', $this->data);
		}
    }
}
