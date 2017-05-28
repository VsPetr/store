<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

class Basket_model extends CI_Model
{
    public $id;
    public $customer_id;
    public $total_qty;
    public $total_price;
    public $archived;
    public $order;

    public function create()
    {

        $data['id'] = $this->input->get('id');
        $this->load->model('Product_model');
        $product = $this->Product_model->load($data);

        $this->load->model('basket_model');
        $result = $this->basket_model->load();
        if ($result == null)
        {
            $this->load->model('basket_model');

            $customer = unserialize($this->session->userdata('customer'));
            $this->customer_id = $customer->id;

            $this->total_qty = $this->input->post('qty');

            $this->total_price = $this->total_qty * $product->price;

            $this->archived = 1;

            $this->db->insert('baskets', $this);
            $this->load->model('basket_model');
            $result = $this->basket_model->load();
        }else{
            $result->total_qty += $this->input->get('qty');
            $result->total_price += $this->input->get('qty') * $product->price;

            //$this->db->set('total_qty', $result->total_qty);
            //$this->db->set('total_price', $result->total_price);
            $this->db->where('id', $result->id);
            $this->db->update('baskets',$result);
        }
        return $result;
    }

    public function load()
    {
        $customer = unserialize($this->session->userdata('customer'));
        $this->customer_id = $customer->id;

        $result = $this->db->from('baskets')
            ->where('archived', 1)
            ->where('customer_id', $customer->id)
            ->limit(1)
            ->get()
            ->result();
        if (empty($result)) {
            return null;
        }
        $result = reset($result);
        $this->id = $result->id;
        $this->customer_id = $result->customer_id;
        $this->total_qty = $result->total_qty;
        $this->total_price = $result->total_price;
        $this->archived = $result->archived;
        $this->order = $result->order;
        return $this;
    }

    public function abate($data)
    {
        $data['id'] = $this->input->get('id');
        $this->load->model('Product_model');
        $product = $this->Product_model->load($data);

        $this->load->model('basket_model');
        $result = $this->basket_model->load();

        $result->total_qty -= $this->input->get('qty');
        $result->total_price -= $this->input->get('qty') * $product->price;
        $this->db->where('id', $result->id);
        $this->db->update('baskets',$result);

        return $result;
    }
}

