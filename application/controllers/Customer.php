<?php

class Customer extends CI_Controller
{
    public function index()
    {
        redirect('home');
    }

    public function register(){
        if ($this->input->method() == 'post') {
            $this->load->model('customer_model');
            $this->customer_model->register();
            $this->session->set_userdata('customer', serialize($this->customer_model));
            redirect('home');
        } else {
            $this->load->view('templates/customer/register');
        }
    }

    public function login(){
        if ($this->input->method() == 'post') {
            $data['login'] = $this->input->post('login');
            $data['password'] = md5($this->input->post('password'));
            $this->load->model('customer_model');
            $customer = $this->customer_model->login($data);
            if (is_null($customer)) {
                $this->load->view('templates/customer/login');
            } else {
                $this->session->set_userdata('customer', serialize($customer));
                redirect('home');
            }
        } else {
            $this->load->view('templates/customer/login');
        }
    }

    public function out(){
        $this->session->unset_userdata('customer');
        redirect('home');
    }
}