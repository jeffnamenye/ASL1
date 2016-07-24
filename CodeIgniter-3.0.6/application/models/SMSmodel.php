<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class SMSModel extends CI_Model {

    function __construct()
    {
    	//Calls my model constructor
        parent::__construct();


    }

    function gettable()
    {
        $query = $this->db->get('studentName');
        return $query->result();

    }

    function getonerow($userid)
    {
    	$this->db->where('userid',$userid);
    	$query = $this->db->get('studentName');
    	return $query->row();

    }

    

}