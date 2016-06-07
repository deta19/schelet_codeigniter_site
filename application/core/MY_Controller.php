<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller
{
  protected $data = array();
  function __construct()
  {
    parent::__construct();
    
  }
 
	protected function render($the_view = NULL , $data=NULL)
	{
		var_dump( $data );
		die(  );
			
		if( empty($this->data['admin']) ){

			$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);

			$this->load->view('template/master_view', $this->data); 

		}else{


		}
	}
}