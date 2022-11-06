<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Kich_hoat extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function Update($id){
       return $this->db->where('ma',$id)->update('dangky',['statust'=>1]);
    }

	public function GetEmail($id)
	{
		$reult = $this->db->get_where('dangky',array('ma'=>$id));
		return $reult->row_array();
	}
	public function Update_dowload($id,$date)
	{
		return $this->db->where('id',$id)->update('dangky',['dowload'=>1,'date'=>$date]);
	} 
}