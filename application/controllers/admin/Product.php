<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin)) {
            redirect('/admin/home');
            exit;
        }
    }

    public function index()
    {

    }

    public function create(){
        if ($this->input->method() == 'post') {
            $this->load->model('product_model');
            $this->product_model->create();
            redirect('/admin/home');
        } else {
            $this->load->view('templates/admin/product');
        }
    }

    public function edit(){
        if ($this->input->method() == 'get') {
            $data['id'] = $this->uri->segments['4'];
            $this->load->model('product_model');
            $result = $this->product_model->load($data);
            $this->load->view('templates/admin/edit',$result);
        }
    }

    public function update(){
        if ($this->input->method() == 'post') {
            $this->load->model('product_model');
            $this->product_model->update();
            redirect('/admin/home');
        } else {
            $this->load->view('templates/admin/edit');
        }
    }

    public function delete(){
        if ($this->input->method() == 'get') {
            $data['id'] = $this->uri->segments['4'];
            $this->load->model('product_model');
            $this->product_model->delete($data);
            redirect('/admin/home');
        }
    }
}