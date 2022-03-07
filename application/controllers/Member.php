<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends Admin_Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Member';
        $this->load->model('Member_model');
        $this->load->model('Location_model');
        $this->load->model('Designation_model');
        $this->load->model('Ministry_model');
        $this->load->model('Department_model');
        $this->load->model('Payscale_model');
        $this->load->model('Appointmenttype_model');
        $this->load->model('Membershipstatus_model');
		$this->load->model('Helper_model');
    }

    public function index()
    {
        if (!in_array('viewMember', $this->permission)) {
            $this->toastr->error('You do not have view permission');
            redirect('admin/dashboard', 'refresh');
        }
        $this->load->view('members/index', $this->data);
    }

    public function dashboard() {
		$this->data['title'] = 'Member Dashboard';
		$this->data['breadcrumbs'] = 'Dashboard';
        $this->data['member_data']  = $this->Member_model->getMemberAllData($this->ion_auth->user()->row()->member_id);
        $this->data['member_balance'] = $this->Member_model->getMemberBalance($this->ion_auth->user()->row()->member_id);
		$this->load->view('members/dashboard_view', $this->data);
	}
    public function change_password()
    {
        $user_id = $this->ion_auth->user()->row()->id;
        $member_id = $this->ion_auth->user()->row()->member_id;        

        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == true) {
			$data = array(
                'password' => $this->input->post('password')
            );
            $update_password = $this->ion_auth->update($user_id, $data);
            if ($update_password == true) {
                $this->session->set_flashdata('success', 'Password Successfully updated');
                redirect('Member/change_password/' . $user_id, 'refresh');

            } 
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('Member/change_password/' . $user_id, 'refresh');
            }
		}
		else{
			$this->load->view('members/change_pwd', $this->data);
		}
    }


    public function fetchMemberData()
    {
        $this->setOutputMode(NORMAL);
        $result = array('data' => array());

        $data = $this->Member_model->getMemberData();

        foreach ($data as $key => $value) {
            // button
            $buttons = '';
            if (in_array('updateMember', $this->permission) && !$this->ion_auth->in_group('member')) {
                $buttons .= '<a href="' . base_url('Member/edit/' . $value['id']) . '" class="btn btn-info btn-sm">Edit</a>&nbsp;';
            }

            if (in_array('deleteMember', $this->permission)) {
                $buttons .= "<a data-toggle='tooltip' class='btn btn-danger btn-sm delete'  id='" . $value['id'] . "' title='Delete'> Delete</a>";
            }

            $result['data'][$key] = array(
                $value['forum_membership_no'],
                $value['name_BN'],
                $value['mobile_no'],
                $value['primary_email'],
				$value['current_designation_name'],
				$value['current_department_name'],
				$value['membershipstatus'],
                $buttons,
            );
        } // /foreach

        echo json_encode($result);
    }

    public function create()
    {

        if (!in_array('createMember', $this->permission)) {
            $this->toastr->error('You do not have create permission');
            redirect('admin/dashboard', 'refresh');
        }
        $this->data['designations'] = $this->Designation_model->fetch_designation();
        $this->data['ministries'] = $this->Ministry_model->fetch_ministry();
        $this->data['departments'] = $this->Department_model->fetch_department();
        $this->data['payscales'] = $this->Payscale_model->fetch_payscale();
        $this->data['appointmenttypes'] = $this->Appointmenttype_model->fetch_appointmenttype();

        $this->form_validation->set_rules('name_BN', 'Member name', 'required');
        $this->form_validation->set_rules('nid', 'National ID', 'required');
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|min_length[11]|max_length[11]|is_unique[members.mobile_no]');
        $this->form_validation->set_rules('primary_email', 'Primary Email', 'required|valid_email|is_unique[members.primary_email]');
        $this->form_validation->set_rules('present_address', 'Present Address', 'required');
        if ($this->form_validation->run() == true) {

            // Handle date field's default 0000-00-00 issue
            if (empty($this->input->post('dob'))) {
                $data['dob'] = null;
            }
            if (empty($this->input->post('first_joining_date'))) {
                $data['first_joining_date'] = null;
            }
            if (empty($this->input->post('current_join_date'))) {
                $data['first_joining_date'] = null;
            }
			

            if ($_FILES['member_image']['size'] > 0) {
                $upload_image = $this->upload_image();
            }
            $data = $this->input->post(null, true);
            $data['image'] = $upload_image;
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_at'] = date('Y-m-d H:i:s');
            $create = $this->Member_model->create($data);

            if ($create == true) {               
                $this->toastr->success('Successfully created!');
                redirect('Member/', 'refresh');
            } else {
                $this->toastr->error('Create failed!');
                redirect('Member/create', 'refresh');
            }
        } else {
            // false case
            $this->load->view('members/create', $this->data);
        }
    }

    /*
     * If the validation is not valid, then it redirects to the edit group page
     * If the validation is successfully then it updates the data into the database
     * and it stores the operation message into the session flashdata and display on the index page
     */
    public function edit($id = null)
    {
        
        if (!$this->Member_model->getMemberAllData($id)) {
            $this->toastr->error('No Members Found with this id!!');
            redirect('member', 'refresh');
        }

        if (!in_array('updateMember', $this->permission)) {
            $this->toastr->error('You do not have update permission');
            redirect('admin/dashboard', 'refresh');
        }
        
        // Permission to restrict one member to update other members profile
        if ($this->ion_auth->in_group('member')) {
            if ($this->ion_auth->user()->row()->member_id != $id) {
                $this->toastr->error('You do not have update permission to update this member\'s profile');
                redirect('member/dashboard', 'refresh');
            }
        }

        $this->data['designations'] = $this->Designation_model->fetch_designation();
        $this->data['ministries'] = $this->Ministry_model->fetch_ministry();
        $this->data['departments'] = $this->Department_model->fetch_department();
        $this->data['payscales'] = $this->Payscale_model->fetch_payscale();
        $this->data['appointmenttypes'] = $this->Appointmenttype_model->fetch_appointmenttype();
        $this->data['membershipstatuses'] = $this->Membershipstatus_model->fetch_membershipstatus();

        if ($id) {

            $this->form_validation->set_rules('name_BN', 'name_BN', 'required');
            $this->form_validation->set_rules('name_BN', 'Member name', 'required');
            $this->form_validation->set_rules('nid', 'National ID', 'required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|exact_length[11]|edit_unique[members.mobile_no.'.$id.']');
            $this->form_validation->set_rules('primary_email', 'Primary Email', 'required|valid_email|edit_unique[members.primary_email.'.$id.']');
            $this->form_validation->set_rules('present_address', 'Present Address', 'required');

            if ($this->form_validation->run() == true) {
                $data = $this->input->post(null, true);
				$data['updated_at'] = date('Y-m-d H:i:s');
                    
                $data['first_joining_designation_name'] = $this->Helper_model->name_from_id('designations', $this->input->post('first_joining_designation_id'));
				$data['first_joining_payscale_name'] = $this->Helper_model->name_from_id('payscales', $this->input->post('first_joining_payscale_id'));
				$data['first_joining_ministry_name'] = $this->Helper_model->name_from_id('ministries', $this->input->post('first_joining_ministry_id'));
				$data['first_joining_department_name'] = $this->Helper_model->name_from_id('departments', $this->input->post('first_joining_department_id'));
				$data['current_designation_name'] = $this->Helper_model->name_from_id('designations', $this->input->post('current_designation_id'));
				$data['current_ministry_name'] = $this->Helper_model->name_from_id('ministries', $this->input->post('current_ministry_id'));
				$data['current_department_name'] = $this->Helper_model->name_from_id('departments', $this->input->post('current_department_id'));

                // Handle date field's default 0000-00-00 issue
                if (empty($this->input->post('dob'))) {
                    $data['dob'] = null;
                }
                if (empty($this->input->post('first_joining_date'))) {
                    $data['first_joining_date'] = null;
                }
                if (empty($this->input->post('current_join_date'))) {
                    $data['current_join_date'] = null;
                }

				if (empty($this->input->post('current_psc_advertisement_date'))) {
					$data['current_psc_advertisement_date'] = null;
				}

                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $upload_image = $this->upload_image();
                    $data['image'] = $upload_image;
                }
                $update = $this->Member_model->edit($data, $id);
                if ($update == true) {
                    $this->session->set_flashdata('success', 'Successfully updated');
                    redirect('Member/edit/' . $id, 'refresh');

                } else {
                    $this->session->set_flashdata('errors', 'Error occurred!!');
                    redirect('Member/edit/' . $id, 'refresh');
                }
            } else {
                // false case
                $member_data = $this->Member_model->getMemberAllData($id);
                $this->data['member_data'] = $member_data;
                $this->load->view('members/edit', $this->data);
            }
        }
    }

    public function upload_image()
    {
        // assets/images/product_image
        $config['upload_path'] = 'assets/uploads';
        $config['file_name'] = uniqid();
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['image']['name']);
            $type = $type[count($type) - 1];

            $path = $config['upload_path'] . '/' . $config['file_name'] . '.' . $type;
            return ($data == true) ? $path : false;
        }
    }

    public function delete()
    {
        header('Content-type: application/json');
        $id = $this->input->post('id');
        $response = array();
        $result = $this->Member_model->delete($id);

        if ($result) {
            echo json_encode(array(
                'status' => 'success',
                'message' => 'Member Deleted Successfully',
            ));
        } else {
            echo json_encode(array(
                'status' => "error",
                'message' => 'Member Deletion Faied!',
            ));
        }

    }

}
