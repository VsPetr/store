<?php

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('Product_model');
        $data['product'] = $this->Product_model->load_all();
        $data['header'] = 'templates/admin/header';
        $data['index'] = 'templates/admin/index';
        $data['products'] = 'templates/admin/products';
        $data['footer'] = 'templates/admin/footer';
        $this->load->view('layouts/application', $data);
    }
}