<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// echo 1;
		
		$this->load->view('welcome_message');
	}


	public function get_data($id = ''){
		if(!$id){
			$url = 'http://localhost/rest_test/api/api_calls/user';
		}else{
			$url = 'http://localhost/rest_test/api/api_calls/user/'.$id;
		}
		
		$key = 'abc';
		$username = 'admin';
		$password = '1234';
		
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_TIMEOUT,30);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY:'.$key));
		curl_setopt($ch,CURLOPT_USERPWD,"$username:$password");
		$result = curl_exec($ch);
		
		echo  $result;
		
		curl_close($ch);

	}


	public function delete_user($id = 2){
		
		$url = 'http://localhost/rest_test/api/api_calls/user/'.$id;
		$key = 'abc';
		$username = 'admin';
		$password = '1234';
		
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_TIMEOUT,30);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY:'.$key));
		curl_setopt($ch,CURLOPT_USERPWD,"$username:$password");
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
		$result = curl_exec($ch);
		
		echo $result;
		
		curl_close($ch);
	}


	public function post_user(){
		// echo "<pre>";print_r($_POST);die;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if($this->form_validation->run()){

			$userData['first_name'] = $this->input->post('first_name');
			$userData['last_name'] = $this->input->post('last_name');
			$userData['role'] = $this->input->post('role');
			$userData['email'] = $this->input->post('email');
			$userData['password'] = $this->input->post('password');

			$url = 'http://localhost/rest_test/api/api_calls/user/';
			$key = 'abc';
			$username = 'admin';
			$password = '1234';
			
			$ch = curl_init($url);
			curl_setopt($ch,CURLOPT_TIMEOUT,30);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
			curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY:'.$key));
			curl_setopt($ch,CURLOPT_USERPWD,"$username:$password");
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$userData);
			$result = curl_exec($ch);
			$result_send['is_valid'] = TRUE;
			$result_send['data'] = $result;
			echo json_encode($result_send);

			curl_close($ch);
		}else{
			// echo form_error()
			if (form_error('first_name')) {
				$errors['first_nameerr'] = form_error('first_name');
			}
			if (form_error('last_name')) {
				$errors['last_nameerr'] = form_error('last_name');
			}
			if (form_error('role')) {
				$errors['roleerr'] = form_error('role');
			}
			if (form_error('password')) {
				$errors['passworderr'] = form_error('password');
			}
			if (form_error('email')) {
				$errors['emailerr'] = form_error('email');
			}

			$result_send['is_valid'] = FALSE;
			$result_send['data'] = $errors;
			echo json_encode($result_send);
		}
	}


	public function put_user(){
		// print_r($_POST);die;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role_type', 'Role', 'required');

		if($this->form_validation->run()){
			$userData['id'] = $this->input->post('id');
			$userData['first_name'] = $this->input->post('first_name');
			$userData['last_name'] = $this->input->post('last_name');
			$userData['role'] = $this->input->post('role');
			$userData['email'] = $this->input->post('email');
			$userData['password'] = $this->input->post('password');

			$url = 'http://localhost/rest_test/api/api_calls/user/';
			$key = 'abc';
			$username = 'admin';
			$password = '1234';
			$ch = curl_init($url);
			curl_setopt($ch,CURLOPT_TIMEOUT,30);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_ANY);
			curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY:'.$key));
			curl_setopt($ch,CURLOPT_USERPWD,"$username:$password");
			curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
			curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($userData));
			$result = curl_exec($ch);
			$result_send['is_valid'] = TRUE;
			$result_send['data'] = $result;
			echo json_encode($result_send);
			

			curl_close($ch);
		}else{
			// echo form_error()
			if (form_error('first_name')) {
				$errors['first_nameerr'] = form_error('first_name');
			}
			if (form_error('last_name')) {
				$errors['last_nameerr'] = form_error('last_name');
			}
			if (form_error('role')) {
				$errors['roleerr'] = form_error('role');
			}
			if (form_error('password')) {
				$errors['passworderr'] = form_error('password');
			}
			if (form_error('email')) {
				$errors['emailerr'] = form_error('email');
			}

			$result_send['is_valid'] = FALSE;
			$result_send['data'] = $errors;
			echo json_encode($result_send);
		}
	}
}
