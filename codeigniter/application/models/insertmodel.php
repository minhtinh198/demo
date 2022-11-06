<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class insertmodel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function Insert($data)
	{
		return $this->db->insert('dangky',$data);
	}

	public function get_mail()
	{
		$email =  $this->db->get('dangky');
		return $email->result();
	}
}