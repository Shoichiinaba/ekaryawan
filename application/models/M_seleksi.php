<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seleksi extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

    function get_latih()
    {
	  return $this->db->get('data_latih')->result();
    }
    
    function get_seleksi()
    {
	  return $this->db->get('hasil_seleksi')->result();
	}

    function delete($params ='')
    {
        $sql = "DELETE  FROM hasil_seleksi WHERE NIK = ? ";
        return $this->db->query($sql, $params);	
    }

}