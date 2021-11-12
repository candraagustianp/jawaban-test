<?php

class UserModel extends CI_Model{

    function get_all(){
		return $this->db->get('user')->result_array();
	}
	function find($username){
		return $this->db->where('username',$username)->get('user')->row_array();
	}
}