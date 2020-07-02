<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function signin()
	{
		$username			=	$this->input->post('username');
		$password			=	$this->input->post('password');
		$query				=	$this->db->get_where('user' , array('username' => $username , 'password' => $password));

		// MATCHES WITH THE USER TABLE
		if ($query->num_rows() > 0) 
		{
			$this->session->set_userdata('user_type' , $query->row()->user_type);
			$this->session->set_userdata('user_id' , $query->row()->user_id);
			$this->session->set_userdata('permissions' , explode(",", $query->row()->permissions));

			redirect(base_url() , 'refresh');
		}
		else
		{
			$this->session->set_flashdata('warning', 'Incorrect username or password, Try again.');
			
			redirect(base_url() . 'login' , 'refresh');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('permissions');
		
		$this->session->set_flashdata('success', 'You have successfully logged out, Thank you.');
		
		redirect(base_url()  . 'login', 'refresh');
	}
}
?>
