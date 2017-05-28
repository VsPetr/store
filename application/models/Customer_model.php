<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

class Customer_model extends CI_Model
{
    public $id;
    public $login;
    public $name;
    public $password;
    public $email;

    public function register(){
        $this->login = $this->input->post('login');
        $this->name = $this->input->post('name');
        $this->password = md5($this->input->post('password'));
        $this->email = $this->input->post('email');

        $this->db->insert('customers', $this);
    }

    public function login($data){
        $login = $data['login'];
        $password = $data['password'];
        $result = $this->db->from('customers')
            ->where('login', $login)
            ->where('password', $password)
            ->limit(1)
            ->get()
            ->result();
        if (empty($result)) {
            return null;
        }
        $result = reset($result);
        $this->id = $result->id;
        $this->login = $result->login;
        $this->name = $result->name;
        $this->password = $result->password;
        $this->email = $result->email;

        return $this;
    }
}

