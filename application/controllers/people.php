<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('peoplemodel');
	}

	public function index()
	{
		$this->load->model('peoplemodel');
		$this->data['names'] = $this->peoplemodel->getPeoples();
	
                
                $this->data['names1'] = $this->peoplemodel->getPeoples2();
		$this->load->view('name_display', $this->data);
                
	}
	
	public function person() {
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$id = $this->input->post('id');
			$URL = $this->input->post('URL');
                        $a = $this->input->post('a');
                        
			$data = $this->peoplemodel->insertperson($id, $URL,$a);
			echo json_encode($data);
		}
		
		
	}
	
}
