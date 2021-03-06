<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//this calls my model
        $this->load->model("SMSModel","m");
	}


	function index()
	{
		$this->load->view('student');
	}


	function savedata()
	{
		//creates an array for the data table from student
		$data = array(
					'studentName' => $this->input->post('studentName'),
					'address' => $this->input->post('address'),
					'phone' => $this->input->post('phone'),
					'grade' => $this->input->post('grade'),
					'gender' => $this->input->post('gender')

			);
				

		//this inserts into database table name userid
		$this->db->insert('studentName',$data);

		//this is for when an insert already is there it will goto the student page
		redirect("Welcome");
	}

	function edit($userid)
	{
		$row = $this->m->getonerow($userid);
		$data['r'] = $row;
		$this->load->view('edit',$data);
	}
	
    function delete($userid)
    {
    	$userid = $this->db->where('userid',$userid);
    	$this->db->delete('studentName');
    	redirect("Welcome");
    }

    function update($userid)
    {
    	$userid = $this->input->post('userid');
    	$data = array(
					'studentName' => $this->input->post('studentName'),
					'address' => $this->input->post('address'),
					'phone' => $this->input->post('phone'),
					'grade' => $this->input->post('grade'),
					'gender' => $this->input->post('gender')
					);

    	$this->db->where('userid',$userid);
    	$this->db->update('studentName',$data);
    	redirect("Welcome/update");
    }
    
}