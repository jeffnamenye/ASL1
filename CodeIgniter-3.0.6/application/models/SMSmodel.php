<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class SMSModel extends CI_Model {

    function __construct()
    {

        parent::__construct();


    }

    function gettable()
    {
        $query = $this->db->get('studentName');
        return $query->result();
        
    }

}