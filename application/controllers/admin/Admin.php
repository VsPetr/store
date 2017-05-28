<?php

class Admin extends CI_Controller
{
    public function index()
    {
        redirect('admin/home');
    }

    public function register(){
        if ($this->input->method() == 'post') {
            $this->load->model('admin_model');
            $this->admin_model->register();
            $this->session->set_userdata('admin', serialize($this->admin_model));
            redirect('/admin/home');
        } else {
            $this->load->view('templates/admin/register');
        }
    }

    public function login(){
        if ($this->input->method() == 'post') {
            $data['login'] = $this->input->post('login');
            $data['password'] = md5($this->input->post('password'));
            $this->load->model('admin_model');
            $customer = $this->admin_model->login($data);
            if (is_null($customer)) {
                $this->load->view('templates/admin/login');
            } else {
                $this->session->set_userdata('admin', serialize($customer));
                redirect('admin/home');
            }
        } else {
            $this->load->view('templates/admin/login');
        }
    }

    public function out(){
        $this->session->unset_userdata('admin');
        redirect('admin/home');
    }
}