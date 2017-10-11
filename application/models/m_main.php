<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_main extends CI_Model{

	function get_user($q) {
		return $this->db->get_where('m_user',$q);
	}

	
}