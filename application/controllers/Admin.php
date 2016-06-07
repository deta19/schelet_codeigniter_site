<?php
defined('BASEPATH') OR exit('No direct script access allowed');

session_start(); //we need to start session in order to access it through CI

class Admin extends MY_Controller
{
	public function index(){	
                
            $this->load->helper(array('form', 'url'));
            
            $this->load->view('/template/admin/header');
            $this->load->view('login');
            $this->load->view('/template/admin/footer');
	}
        
        public function login(){
            
            $this->load->library('form_validation');

            $this->load->model('Users');
            
            $config = array(
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
                     'rules'   => 'required|valid_email'
                  )
            );
            
            $this->form_validation->set_rules($config);
        
            if ($this->form_validation->run() == FALSE)
            {
              
                $this->load->view('/template/admin/header');
                $this->load->view('login');
                $this->load->view('/template/admin/footer');
            }
            else {
                
                $email = $this->input->post('email');
                $password = $this->input->post('username');
                
//                $session_data = array(
//                                    'email' => $email,
//                                );
//                
                //$this->session->set_userdata('logged_in', $session_data);   
                //Field validation succeeded.  Validate against database
               
                //query the database
                $result = $this->User->login($email, $password);

		$this->load->view('/template/admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('/template/admin/footer');
               
            }
            
            
        }
        
        public function logout() {
            // Removing session data
            $sess_array = array(
                                'username' => ''
                            );
            $this->session->unset_userdata('logged_in', $sess_array);
            $data['message_display'] = 'Successfully Logout';
            $this->load->view('login_form', $data);
            $this->load->view('/template/header');
            $this->load->view('admin/dashboard');
            $this->load->view('/template/footer');
        }


        public function register(){
	
		$this->load->view('/template/admin/header');
		$this->load->view('register');
		$this->load->view('/template/admin/footer');
	}
	
        public function profile(){
            
                $this->load->model('User');
                
                $data['email'] = $this->User->getEmail();
                
            
                $this->load->view('/template/admin/header');
		$this->load->view('admin/profile', $data);
		$this->load->view('/template/admin/footer');
        }
        
	public function dashboard(){
	
		$this->load->view('/template/admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('/template/admin/footer');
	}

	public function stats(){
	
	
		$this->load->view('/template/admin/header');
		$this->load->view('admin/stats');
		$this->load->view('/template/admin/footer');
	}
	
	public function calendar(){
	
		$this->load->view('/template/admin/header');
		$this->load->view('admin/calendar');
		$this->load->view('/template/admin/footer');
	}
	
}