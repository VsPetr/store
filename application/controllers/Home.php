<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['header'] = 'templates/customer/header';
        $data['index'] = 'templates/customer/index';
        $data['products'] = 'templates/customer/products';
        $data['footer'] = 'templates/customer/footer';
        $this->load->view('layouts/home', $data);
    }
}