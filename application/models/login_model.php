<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @name: Login model
 * @author: Imron Rosdiana
 */
class Login_model extends CI_Model
{
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function validate_user($data) {
        $this->db->where('email', $data['username']);
        $this->db->where('senha', $data['password']);
        return $this->db->get('usuario')->row();
    }
 
    function __destruct() {
        $this->db->close();
    }
}