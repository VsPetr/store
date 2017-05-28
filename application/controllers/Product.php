<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->customer)) {
            redirect('home');
            exit;
        }
    }

    public function index()
    {
        $this->load->model('Product_model');
        $data['product'] = $this->Product_model->load_all();
        $data['header'] = 'templates/customer/header';
        $data['index'] = 'templates/customer/banner';
        $data['products'] = 'templates/customer/products';
        $data['footer'] = 'templates/customer/footer';
        $this->load->view('layouts/application', $data);
    }

    public function view(){
        $data['id'] = $this->input->get('id');
        $this->load->model('Product_model');
        $data['product'] = $this->Product_model->load($data);
        $this->load->model('basket_model');
        $basket = $this->basket_model->load();
        $data['total_qty'] = $basket->total_qty;
        $this->load->view('templates/customer/product', $data);
    }

}