<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends MY_Controller 
{
	public function index() {
            
            $this->load->view('/template/header');
            $this->load->view('welcome_message');
            $this->load->view('/template/footer');
	}
}