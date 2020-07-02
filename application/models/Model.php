<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	function add_room()
	{
		$data['room_number']			=	$this->input->post('room_number');
		$data['floor']					=	$this->input->post('floor');
		$data['remarks']				=	$this->input->post('remarks');
		$data['created_on']				=	time();
		$data['created_by']				=	$this->session->userdata('user_id');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->insert('room', $data);
		
		$this->session->set_flashdata('success', 'New room has been added successfully.');
		
		redirect(base_url() . 'rooms', 'refresh');
	}
	
	function update_room($room_id = '')
	{
		$data['room_number']			=	$this->input->post('room_number');
		$data['floor']					=	$this->input->post('floor');
		$data['remarks']				=	$this->input->post('remarks');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('room_id', $room_id);
		$this->db->update('room', $data);
		
		$this->session->set_flashdata('success', 'Room has been updated successfully.');
		
		redirect(base_url() . 'rooms', 'refresh');
	}
	
	function remove_room($room_id = '')
	{
		$beds = $this->db->get_where('bed', array('room_id' => $room_id))->result_array();
		
		foreach ($beds as $bed)
		{
			$query							=	$this->db->get_where('tenant' , array('bed_id' => $bed['bed_id']));
		
			if ($query->num_rows() > 0) 
			{
				$tenant_id 					=	$query->row()->tenant_id;
				
				$data['bed_id']				=	0;
				$data['status']				=	0;
				$data['timestamp']			=	time();
				$data['updated_by']			=	$this->session->userdata('user_id');
				
				$this->db->where('tenant_id', $tenant_id);
				$this->db->update('tenant', $data);
			}
			
			$this->db->where('bed_id', $bed['bed_id']);
			$this->db->delete('bed');
		}
		
		$this->db->where('room_id', $room_id);
		$this->db->delete('room');
		
		$this->session->set_flashdata('success', 'Room has been deleted successfully.');
		
		redirect(base_url() . 'rooms', 'refresh');
	}
	
	function add_bed()
	{
		$data['bed_number']				=	$this->input->post('bed_number');
		$data['room_id']				=	$this->input->post('room_id');
		$data['status']					=	0;
		$data['rent']					=	$this->input->post('rent');
		$data['remarks']				=	$this->input->post('remarks');
		$data['created_on']				=	time();
		$data['created_by']				=	$this->session->userdata('user_id');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->insert('bed', $data);
		
		$this->session->set_flashdata('success', 'New bed has been added successfully.');
		
		redirect(base_url() . 'beds', 'refresh');
	}
	
	function update_bed($bed_id = '')
	{
		$data['bed_number']				=	$this->input->post('bed_number');
		$data['room_id']				=	$this->input->post('room_id');
		$data['rent']					=	$this->input->post('rent');
		$data['remarks']				=	$this->input->post('remarks');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('bed_id', $bed_id);
		$this->db->update('bed', $data);
		
		$this->session->set_flashdata('success', 'Bed has been updated successfully.');
		
		redirect(base_url() . 'beds', 'refresh');
	}
	
	function remove_bed($bed_id = '')
	{
		$query							=	$this->db->get_where('tenant' , array('bed_id' => $bed_id));
		
		if ($query->num_rows() > 0) 
		{
			$tenant_id 					=	$query->row()->tenant_id;
			
			$data['bed_id']				=	0;
			$data['status']				=	0;
			$data['timestamp']			=	time();
			$data['updated_by']			=	$this->session->userdata('user_id');
			
			$this->db->where('tenant_id', $tenant_id);
			$this->db->update('tenant', $data);
		}
		
		$this->db->where('bed_id', $bed_id);
		$this->db->delete('bed');
		
		$this->session->set_flashdata('success', 'Bed has been deleted successfully.');
		
		redirect(base_url() . 'beds', 'refresh');
	}
	
	function add_tenant()
	{
		$ext 							= 	pathinfo($_FILES['image_link']['name'], PATHINFO_EXTENSION);
		
		if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'PNG') {
            $data['name']				=	$this->input->post('name');
			$data['mobile_number']		=	$this->input->post('mobile_number');
			$data['email']				=	$this->input->post('email');
			$data['id_type_id']			=	$this->input->post('id_type_id');
			$data['id_number']			=	$this->input->post('id_number');
			$data['image_link'] 		= 	strtolower(explode(" ", $data['name'])[0]) . '_' . time() . '.' . $ext;
			$data['home_address']		=	$this->input->post('home_address');
			$data['emergency_person']	=	$this->input->post('emergency_person');
			$data['emergency_contact']	=	$this->input->post('emergency_contact');
			$data['bed_id']				=	$this->input->post('bed_id');
			$data['profession_id']		=	$this->input->post('profession_id');
			$data['work_address']		=	$this->input->post('work_address');
			$data['status']				=	$this->input->post('status');
			$data['extra_note']			=	$this->input->post('extra_note');
			$data['created_on']			=	time();
			$data['created_by']			=	$this->session->userdata('user_id');
			$data['timestamp']			=	time();
			$data['updated_by']			=	$this->session->userdata('user_id');
			
			$this->db->insert('tenant', $data);
			
			move_uploaded_file($_FILES['image_link']['tmp_name'], 'uploads/tenants/' . $data['image_link']);
			
			$data2['status']				=	1;
			$data2['timestamp']				=	time();
			
			$this->db->where('bed_id', $data['bed_id']);
			$this->db->update('bed', $data2);
			
			$this->session->set_flashdata('success', 'New tenant has been added successfully.');
			
			redirect(base_url() . 'tenants', 'refresh');
        } else {
			$this->session->set_flashdata('warning', 'Only supported image types: jpeg, jpg, png');
            
            redirect(base_url() . 'tenants', 'refresh');
		}		
	}
	
	function change_tenant_image($tenant_id = '')
	{
		$ext 							= 	pathinfo($_FILES['image_link']['name'], PATHINFO_EXTENSION);
		
		if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'PNG') {
            $image_link 				= 	$this->db->get_where('tenant', array('tenant_id' => $tenant_id))->row()->image_link;
		
			if (isset($image_link)) unlink('uploads/tenants/' . $image_link);
			
			$tenant_name 				=	$this->db->get_where('tenant', array('tenant_id' => $tenant_id))->row()->name;
			
			$data['image_link'] 		= 	strtolower(explode(" ", $tenant_name)[0]) . '_' . time() . '.' . $ext;
			$data['timestamp']			=	time();
			$data['updated_by']			=	$this->session->userdata('user_id');
	        
	        move_uploaded_file($_FILES['image_link']['tmp_name'], 'uploads/tenants/' . $data['image_link']);
	        
	        $this->db->where('tenant_id', $tenant_id);
	        $this->db->update('tenant', $data);
	        
	        $this->session->set_flashdata('success', 'Tenant image has been updated successfully.');
	        
	        redirect(base_url() . 'tenants', 'refresh');
        } else {
			$this->session->set_flashdata('warning', 'Only supported image types: jpeg, jpg, png');
            
            redirect(base_url() . 'tenants', 'refresh');
		}		
	}
	
	function update_tenant($tenant_id = '')
	{
		$bed_id 						=	$this->db->get_where('tenant', array('tenant_id' => $tenant_id))->row()->bed_id;
		
		if ($bed_id != $this->input->post('bed_id')) 
		{
			$data2['status']			=	0;
			$data2['timestamp']			=	time();
			$data2['updated_by']		=	$this->session->userdata('user_id');
		
			$this->db->where('bed_id', $bed_id);
			$this->db->update('bed', $data2);
			
			$data3['status']			=	1;
			$data3['timestamp']			=	time();
			$data3['updated_by']		=	$this->session->userdata('user_id');
			
			$this->db->where('bed_id', $this->input->post('bed_id'));
			$this->db->update('bed', $data3);
		}
		
		if ($this->input->post('status') == 0)
		{
			$data4['status']			=	0;
			$data4['timestamp']			=	time();
			$data4['updated_by']		=	$this->session->userdata('user_id');
		
			$this->db->where('bed_id', $this->input->post('bed_id'));
			$this->db->update('bed', $data4);
		} elseif ($this->input->post('status') == 1)
		{
			$data4['status']			=	1;
			$data4['timestamp']			=	time();
			$data4['updated_by']		=	$this->session->userdata('user_id');
		
			$this->db->where('bed_id', $this->input->post('bed_id'));
			$this->db->update('bed', $data4);
		}
		
		$data['name']					=	$this->input->post('name');
		$data['mobile_number']			=	$this->input->post('mobile_number');
		$data['email']					=	$this->input->post('email');
		$data['id_type_id']				=	$this->input->post('id_type_id');
		$data['id_number']				=	$this->input->post('id_number');
		$data['home_address']			=	$this->input->post('home_address');
		$data['emergency_person']		=	$this->input->post('emergency_person');
		$data['emergency_contact']		=	$this->input->post('emergency_contact');
		$data['bed_id ']				= 	$this->input->post('bed_id');
		$data['profession_id']			=	$this->input->post('profession_id');
		$data['work_address']			=	$this->input->post('work_address');
		$data['status']					=	$this->input->post('status');
		$data['extra_note']				=	$this->input->post('extra_note');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('tenant_id', $tenant_id);
		$this->db->update('tenant', $data);
		
		$this->session->set_flashdata('success', 'Tenant has been updated successfully.');
		
		redirect(base_url() . 'tenants', 'refresh');
	}
	
	function remove_tenant($tenant_id = '')
	{
		$image_link 					= 	$this->db->get_where('tenant', array('tenant_id' => $tenant_id))->row()->image_link;
		$bed_id 						=	$this->db->get_where('tenant', array('tenant_id' => $tenant_id))->row()->bed_id;
		
		if (isset($image_link)) unlink('uploads/tenants/' . $image_link);
		
		$data['status']					=	0;
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('bed_id', $bed_id);
		$this->db->update('bed', $data);
		
		$this->db->where('tenant_id', $tenant_id);
		$this->db->delete('tenant');
		
		$this->session->set_flashdata('success', 'Tenant has been deleted successfully.');
		
		redirect(base_url() . 'tenants', 'refresh');
	}
	
	function add_utility_bill()
	{
		$data['utility_bill_category_id']	=	$this->input->post('utility_bill_category_id');
		$data['year']						=	$this->input->post('year');
		$data['month']						=	$this->input->post('month');
		$data['amount']						=	$this->input->post('amount');
		$data['status']						=	$this->input->post('status');
		$data['created_on']					=	time();	
		$data['created_by']					=	$this->session->userdata('user_id');
		$data['timestamp']					=	time();	
		$data['updated_by']					=	$this->session->userdata('user_id');
		
		$this->db->insert('utility_bill', $data);
		
		$this->session->set_flashdata('success', 'New utility bill has been added successfully.');
		
		redirect(base_url() . 'utility_bills', 'refresh');
	}
	
	function update_utility_bill($utility_bill_id = '')
	{
		$data['utility_bill_category_id']	=	$this->input->post('utility_bill_category_id');
		$data['year']						=	$this->input->post('year');
		$data['month']						=	$this->input->post('month');
		$data['amount']						=	$this->input->post('amount');
		$data['status']						=	$this->input->post('status');
		$data['timestamp']					=	time();	
		$data['updated_by']					=	$this->session->userdata('user_id');
		
		$this->db->where('utility_bill_id', $utility_bill_id);
		$this->db->update('utility_bill', $data);
		
		$this->session->set_flashdata('success', 'Utility bill has been updated successfully.');
		
		redirect(base_url() . 'utility_bills', 'refresh');
	}
	
	function remove_utility_bill($utility_bill_id = '')
	{
		$this->db->where('utility_bill_id', $utility_bill_id);
		$this->db->delete('utility_bill');
		
		$this->session->set_flashdata('success', 'Utility bill has been deleted successfully.');
		
		redirect(base_url() . 'utility_bills', 'refresh');
	}
	
	// Function related to adding utility bill category
	function add_utility_bill_category()
	{
		$data['name']					=	$this->input->post('name');	
		$data['created_on']				=	time();	
		$data['created_by']				=	$this->session->userdata('user_id');
		$data['timestamp']				=	time();	
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->insert('utility_bill_category', $data);
		
		$this->session->set_userdata('success', 'New utility bill category has been added successfully.');
		
		redirect(base_url() . 'utility_bill_categories', 'refresh');
	}
	
	// Function related to updating utility bill category
	function update_utility_bill_category($utility_bill_category_id = '')
	{
		$data['name']					=	$this->input->post('name');	
		$data['timestamp']				=	time();	
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('utility_bill_category_id', $utility_bill_category_id);
		$this->db->update('utility_bill_category', $data);
		
		$this->session->set_userdata('success', 'Utility bill category has been updated successfully.');
		
		redirect(base_url() . 'utility_bill_categories', 'refresh');
	}
	
	// Function related to removing utility bill category
	function remove_utility_bill_category($utility_bill_category_id = '')
	{
		$this->db->where('utility_bill_category_id', $utility_bill_category_id);
		$this->db->delete('utility_bill_category');
		
		$this->session->set_userdata('success', 'Utility bill category has been deleted successfully.');
		
		redirect(base_url() . 'utility_bill_categories', 'refresh');
	}
	
	function add_expense()
	{
		$data['name']						=	$this->input->post('name');
		$data['amount']						=	$this->input->post('amount');
		$data['description']				=	$this->input->post('description');
		$data['year']						=	$this->input->post('year');
		$data['month']						=	$this->input->post('month');
		$data['created_on']					=	time();	
		$data['created_by']					=	$this->session->userdata('user_id');
		$data['timestamp']					=	time();	
		$data['updated_by']					=	$this->session->userdata('user_id');
		
		$this->db->insert('expense', $data);
		
		$this->session->set_userdata('success', 'New expense has been added successfully.');
		
		redirect(base_url() . 'expenses', 'refresh');
	}
	
	function update_expense($expense_id = '')
	{
		$data['name']						=	$this->input->post('name');
		$data['amount']						=	$this->input->post('amount');
		$data['description']				=	$this->input->post('description');
		$data['year']						=	$this->input->post('year');
		$data['month']						=	$this->input->post('month');
		$data['timestamp']					=	time();
		$data['updated_by']					=	$this->session->userdata('user_id');
		
		$this->db->where('expense_id', $expense_id);
		$this->db->update('expense', $data);
		
		$this->session->set_userdata('success', 'Expense has been updated successfully.');
		
		redirect(base_url() . 'expenses', 'refresh');
	}
	
	function remove_expense($expense_id = '')
	{
		$this->db->where('expense_id', $expense_id);
		$this->db->delete('expense');
		
		$this->session->set_userdata('success', 'Expense has been deleted successfully.');
		
		redirect(base_url() . 'expenses', 'refresh');
	}
	
	function add_staff()
	{
		$data['name']					=	$this->input->post('name');
		$data['role']					=	$this->input->post('role');
		$data['mobile_number']			=	$this->input->post('mobile_number');
		$data['status']					=	$this->input->post('status');
		$data['remarks']				=	$this->input->post('remarks');
		$data['created_on']				= 	time();
		$data['created_by']				=	$this->session->userdata('user_id');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->insert('staff', $data);
		
		$data2['staff_id']				=	$this->db->insert_id();
		$data2['username']				=	strtolower(explode(" ", $data['name'])[0]) . $data2['staff_id'];
		$data2['password']				=	rand(1000, 10000);
		$data2['user_type']				=	2;
		$data2['status']				=	$this->input->post('status');
		$data2['created_on']			= 	time();
		$data2['created_by']			=	$this->session->userdata('user_id');
		$data2['timestamp']				=	time();
		$data2['updated_by']			=	$this->session->userdata('user_id');
		
		$this->db->insert('user', $data2);
		
		$this->session->set_userdata('success', 'New staff has been added successfully.');
		
		redirect(base_url() . 'staff', 'refresh');

	}
	
	function update_staff($staff_id = '')
	{
		$data['name']					=	$this->input->post('name');
		$data['role']					=	$this->input->post('role');
		$data['mobile_number']			=	$this->input->post('mobile_number');
		$data['status']					=	$this->input->post('status');
		$data['remarks']				=	$this->input->post('remarks');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('staff_id', $staff_id);
		$this->db->update('staff', $data);
		
		$data2['username']				=	$this->input->post('username');
		$data2['password']				=	$this->input->post('password');
		$data2['status']				=	$this->input->post('status');
		$data2['timestamp']				=	time();
		$data2['updated_by']			=	$this->session->userdata('user_id');
		
		$this->db->where('staff_id', $staff_id);
		$this->db->update('user', $data2);
		
		$this->session->set_userdata('success', 'Staff has been updated successfully.');
		
		redirect(base_url() . 'staff', 'refresh');
	}
	
	function remove_staff($staff_id = '')
	{
		$this->db->where('staff_id', $staff_id);
		$this->db->delete('staff');
		
		$this->db->where('staff_id', $staff_id);
		$this->db->delete('user');
		
		$this->session->set_userdata('success', 'Staff has been deleted successfully.');
		
		redirect(base_url() . 'staff', 'refresh');
	}
	
	function update_staff_permission($staff_id = '')
	{
		$permission 					= 	$this->input->post('permission');
		
		$permissions 					=	'';
		
		if (isset($permission)) 
		{
			foreach ($permission as $key => $value)
			{
				$permissions			.=	$value . ',';
			}
		} 
		
		$data['permissions']			=	substr(trim($permissions), 0, -1);
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('staff_id', $staff_id);
		$this->db->update('user', $data);
		
		$this->session->set_userdata('success', 'Staff permission has been updated successfully.');
		
		redirect(base_url() . 'staff', 'refresh');
	}
	
	function add_staff_salary()
	{
		$data['staff_id']				=	$this->input->post('staff_id');
		$data['year']					=	$this->input->post('year');
		$data['month']					=	$this->input->post('month');
		$data['amount']					=	$this->input->post('amount');
		$data['status']					=	$this->input->post('status');
		$data['created_on']				= 	time();
		$data['created_by']				=	$this->session->userdata('user_id');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->insert('staff_salary', $data);
		
		$this->session->set_userdata('success', 'New staff salary has been added successfully.');
		
		redirect(base_url() . 'staff_payroll', 'refresh');
	}
	
	function update_staff_salary($staff_salary_id = '')
	{
		$data['staff_id']				=	$this->input->post('staff_id');
		$data['year']					=	$this->input->post('year');
		$data['month']					=	$this->input->post('month');
		$data['amount']					=	$this->input->post('amount');
		$data['status']					=	$this->input->post('status');
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('staff_salary_id', $staff_salary_id);
		$this->db->update('staff_salary', $data);
		
		$this->session->set_userdata('success', 'Staff salary has been updated successfully.');
		
		redirect(base_url() . 'staff_payroll', 'refresh');
	}
	
	function remove_staff_salary($staff_salary_id = '')
	{
		$this->db->where('staff_salary_id', $staff_salary_id);
		$this->db->delete('staff_salary');
		
		$this->session->set_userdata('success', 'Staff salary has been deleted successfully.');
		
		redirect(base_url() . 'staff_payroll', 'refresh');
	}
	
	function generate_single_rent()
	{
		$tenant_id 						= 	$this->input->post('tenant_id');
		$bed_id 						=	$this->db->get_where('tenant', array('tenant_id' => $tenant_id))->row()->bed_id;
		$year 							=	$this->input->post('year');
		
		foreach ($this->input->post('months') as $i => $value)
		{
			if (!($this->db->get_where('tenant_rent', array('month' => $value, 'year' => $year, 'tenant_id' => $tenant_id))->num_rows() > 0))
			{
				$data['tenant_id'] 		= 	$tenant_id;
				$data['status']			= 	$this->input->post('status');
				$data['month']			=	$value;
				$data['year']			=	$year;
				$data['amount']			=	$this->db->get_where('bed', array('bed_id' => $bed_id))->row()->rent;
				if ($this->input->post('advance') > 0 && $i == 0)
				{
					$data['advance']	=	$this->input->post('advance');
				} else {
					$data['advance']	=	0;
				}
				$data['created_on']				= 	time();
				$data['created_by']				=	$this->session->userdata('user_id');
				$data['timestamp']				=	time();
				$data['updated_by']				=	$this->session->userdata('user_id');

				$this->db->insert('tenant_rent', $data);
			}
		}
		
		$this->session->set_userdata('success', 'Single tenant rent has been generated successfully.');
		
		redirect(base_url() . 'rents', 'refresh');
	}
	
	function generate_monthly_rent()
	{	
		$month 									= 	$this->input->post('month');
		$year 									= 	$this->input->post('year');
		
		$tenants 								=	$this->db->get_where('tenant', array('status' => 1))->result_array();
		
		foreach ($tenants as $tenant)
		{
			if (!($this->db->get_where('tenant_rent', array('month' => $month, 'year' => $year, 'tenant_id' => $tenant['tenant_id']))->num_rows() > 0))
			{
				$data['tenant_id'] 				= 	$tenant['tenant_id'];
				$data['status']					= 	0;
				$data['month']					=	$this->input->post('month');
				$data['year']					=	$this->input->post('year');
				$data['amount']					=	$this->db->get_where('bed', array('bed_id' => $tenant['bed_id']))->row()->rent;
				$data['advance']				=	0;
				$data['created_on']				= 	time();
				$data['created_by']				=	$this->session->userdata('user_id');
				$data['timestamp']				=	time();
				$data['updated_by']				=	$this->session->userdata('user_id');

				$this->db->insert('tenant_rent', $data);
			}
		}
		
		$this->session->set_userdata('success', 'Monthly rents have been generated successfully.');
		
		redirect(base_url() . 'rents', 'refresh');
	}
	
	function update_tenant_rent($tenant_rent_id = '')
	{
		$bed_id 						=	$this->db->get_where('tenant', array('tenant_id' => $this->input->post('tenant_id')))->row()->bed_id;
		
		$data['tenant_id'] 				= 	$this->input->post('tenant_id');
		$data['status']					= 	$this->input->post('status');
		$data['month']					=	$this->input->post('month');
		$data['year']					=	$this->input->post('year');
		$data['amount']					=	$this->db->get_where('bed', array('bed_id' => $bed_id))->row()->rent;
		if ($this->input->post('advance') > 0)
		{
			$data['advance']			=	$this->input->post('advance');
		} else {
			$data['advance']			=	0;
		}
		$data['timestamp']				=	time();
		$data['updated_by']				=	$this->session->userdata('user_id');
		
		$this->db->where('tenant_rent_id', $tenant_rent_id);
		$this->db->update('tenant_rent', $data);
		
		$this->session->set_userdata('success', 'Rent has been updated successfully.');
		
		redirect(base_url() . 'rents', 'refresh');
	}
	
	function remove_tenant_rent($tenant_rent_id = '')
	{
		$this->db->where('tenant_rent_id', $tenant_rent_id);
		$this->db->delete('tenant_rent');
		
		$this->session->set_userdata('success', 'Rent has been deleted successfully.');
		
		redirect(base_url() . 'rents', 'refresh');
	}
	
	// Function related to adding id type
	function add_id_type()
	{
		$data['name']					=	$this->input->post('name');
		$data['created_on']				= 	time();
		$data['created_by']				= 	$this->session->userdata('user_id');
		$data['timestamp']				= 	time();
		$data['updated_by']				= 	$this->session->userdata('user_id');
		
		$this->db->insert('id_type', $data);
		
		$this->session->set_userdata('success', 'New ID type has been added successfully.');
		
		redirect(base_url() . 'id_type_settings', 'refresh');
	}
	
	// Function related to updating profession
	function update_id_type($id_type_id = '')
	{
		$data['name']					=	$this->input->post('name');
		$data['timestamp']				= 	time();
		$data['updated_by']				= 	$this->session->userdata('user_id');
		
		$this->db->where('id_type_id', $id_type_id);
		$this->db->update('id_type', $data);
		
		$this->session->set_userdata('success', 'ID type has been updated successfully.');
		
		redirect(base_url() . 'id_type_settings', 'refresh');
	}
	
	// Function related to deleting profession
	function remove_id_type($id_type_id = '')
	{
		$this->db->where('id_type_id', $id_type_id);
		$this->db->delete('id_type');
		
		$this->session->set_userdata('success', 'ID type has been deleted successfully.');
		
		redirect(base_url() . 'id_type_settings', 'refresh');
	}
	
	// Function related to website settings
	function update_website_settings()
	{
		if ($this->input->post('system_name')) 
		{
			$data1['content']			=	$this->input->post('system_name');
			
			$this->db->where('name', 'system_name');
			$this->db->update('setting', $data1);
		}
		
		if ($this->input->post('currency')) 
		{
			$data2['content']			=	$this->input->post('currency');
			
			$this->db->where('name', 'currency');
			$this->db->update('setting', $data2);
		}
		
		if ($this->input->post('tagline')) 
		{
			$data3['content']			=	$this->input->post('tagline');
			
			$this->db->where('name', 'tagline');
			$this->db->update('setting', $data3);
		}
		
		if ($this->input->post('timezone')) 
		{
			$data4['content']			=	$this->input->post('timezone');
			
			$this->db->where('name', 'timezone');
			$this->db->update('setting', $data4);
		}
		
		$this->session->set_flashdata('success', 'Website settings has been updated successfully.');
		
		redirect(base_url() . 'website_settings', 'refresh');
	}
	
	// Function realted to website logo update
	function update_website_logo()
	{
		$ext 							= 	pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
		
		if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'PNG') {
            $logo 						= 	$this->db->get_where('setting', array('name' => 'logo'))->row()->content;
		
			if (isset($logo)) unlink('uploads/website/' . $logo);
			
			$data['content'] 			= 	$_FILES['logo']['name'];
			$data['timestamp']			=	time();
			$data['updated_by']			=	$this->session->userdata('user_id');
	        
	        move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/website/' . $data['content']);
	        
	        $this->db->where('name', 'logo');
	        $this->db->update('setting', $data);
	        
	        $this->session->set_flashdata('success', 'Website logo has been updated successfully.');
	        
	        redirect(base_url() . 'website_settings', 'refresh');
        } else {
			$this->session->set_flashdata('warning', 'Only supported image types: jpeg, jpg, png');
            
            redirect(base_url() . 'website_settings', 'refresh');
		}
	}
	
	// Function realted to website favicon update
	function update_website_favicon()
	{
		$ext 							= 	pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
		
		if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'PNG') {
            $favicon 					= 	$this->db->get_where('setting', array('name' => 'favicon'))->row()->content;
		
			if (isset($favicon)) unlink('uploads/website/' . $favicon);
			
			$data['content'] 			= 	$_FILES['favicon']['name'];
			$data['timestamp']			=	time();
			$data['updated_by']			=	$this->session->userdata('user_id');
	        
	        move_uploaded_file($_FILES['favicon']['tmp_name'], 'uploads/website/' . $data['content']);
	        
	        $this->db->where('name', 'favicon');
	        $this->db->update('setting', $data);
	        
	        $this->session->set_flashdata('success', 'Website favicon has been updated successfully.');
	        
	        redirect(base_url() . 'website_settings', 'refresh');
        } else {
			$this->session->set_flashdata('warning', 'Only supported image types: jpeg, jpg, png');
            
            redirect(base_url() . 'website_settings', 'refresh');
		}
	}
	
	// Function related to adding profession
	function add_profession()
	{
		$data['name']					=	$this->input->post('name');
		$data['created_on']				= 	time();
		$data['created_by']				= 	$this->session->userdata('user_id');
		$data['timestamp']				= 	time();
		$data['updated_by']				= 	$this->session->userdata('user_id');
		
		$this->db->insert('profession', $data);
		
		$this->session->set_userdata('success', 'New profession has been added successfully.');
		
		redirect(base_url() . 'profession_settings', 'refresh');
	}
	
	// Function related to updating profession
	function update_profession($profession_id = '')
	{
		$data['name']					=	$this->input->post('name');
		$data['timestamp']				= 	time();
		$data['updated_by']				= 	$this->session->userdata('user_id');
		
		$this->db->where('profession_id', $profession_id);
		$this->db->update('profession', $data);
		
		$this->session->set_userdata('success', 'Profession has been updated successfully.');
		
		redirect(base_url() . 'profession_settings', 'refresh');
	}
	
	// Function related to deleting profession
	function remove_profession($profession_id = '')
	{
		$this->db->where('profession_id', $profession_id);
		$this->db->delete('profession');
		
		$this->session->set_userdata('success', 'Profession has been deleted successfully.');
		
		redirect(base_url() . 'profession_settings', 'refresh');
	}
	
	function update_profile_settings($user_id = '')
	{
		$data['username']				=	$this->input->post('username');
		$data['password']				=	$this->input->post('password');
		
		$this->db->where('user_id', $user_id);
		$this->db->update('user', $data);
		
		$this->session->set_userdata('success', 'Your profile has been updated successfully.');
		
		redirect(base_url() . 'profile_settings', 'refresh');
	}
}
