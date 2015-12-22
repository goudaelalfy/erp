<?php
session_start();
error_reporting(0);
class Login extends Controller 
{
		
		function Login()
		{
			parent::Controller();
			//$this->load->helper('url');
			//$this->load->library('session');
			$this->load->model('main/login_model','login',TRUE);
		}
		
		function index()
		{
			/* if the form is submitted – check whether the user is already logged in or not */
			if($this->login->check_session())
			{
				redirect('main/main');
			}
			$this->load->library('validation');
			
			$rules['username'] = "trim|required";
			$rules['password'] = "required";
			$this->validation->set_rules($rules);
			
			$fields['username'] = 'Username';
			$fields['password'] = 'Password';
			$this->validation->set_fields($fields);
			
			/* check all fields are validated correctly */
			if($this->validation->run() == FALSE)
			{
				$this->load->view('main/login');
			}
			else
			{
				$userName = $this->input->post('txtUserName');
				$password = $this->input->post('txtPassword');
				
				$chkAuth = $this->login->checkAuth($userName,$password);
				if($chkAuth)
				{
					redirect('main/main'); //load cpanel file – authentication successful
				}
				else
				{
					redirect('main/login/invalid'); //failed auth – return to the login form
				}
			}
		}
}
?>