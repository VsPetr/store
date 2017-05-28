<?php

class Basket extends CI_Controller
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
        redirect('home');
    }

    public function create()
    {
        if(!$this->input->get('qty')==""||!$this->input->get('qty')==0){
            $this->load->model('basket_model');
            $basket = $this->basket_model->create();
            $data['basket_id'] = $basket->id;
            $this->load->model('basket_item_model');
            $this->basket_item_model->create($data);
        }
        redirect('product/view?id='.$this->input->get('id'));
    }

    public function view()
    {
        $this->load->model('basket_model');
        $basket = $this->basket_model->load();
        $data['basket_id'] = $basket->id;
        $this->load->model('basket_item_model');
        $data['product'] = $this->basket_item_model->load_from_basket($data);
        $data['header'] = 'templates/customer/header';
        $data['index'] = 'templates/customer/banner_basket';
        $data['products'] = 'templates/customer/basket';
        $data['footer'] = 'templates/customer/footer';
        $basket = $this->basket_model->load();
        $data['basket'] = $basket;
        $this->load->view('layouts/application', $data);
    }

    public function abate()
    {
        if(!$this->input->get('qty')==""||!$this->input->get('qty')==0){
            $this->load->model('basket_model');
            $basket = $this->basket_model->abate();
            $data['basket_id'] = $basket->id;
            $this->load->model('basket_item_model');
            $this->basket_item_model->create($data);
        }
        redirect('product/view?id='.$this->input->get('id'));
    }

    public function delete_item()
    {

    }
}