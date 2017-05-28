<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

class Basket_item_model extends CI_Model
{
    public $id;
    public $basket_id;
    public $product_id;
    public $qty;

    public function create($data)
    {
        $data['id'] = $this->input->get('id');

        $this->load->model('basket_item_model');
        $basket_item = $this->basket_item_model->load($data);

        if ($basket_item == null) {
            $this->load->model('Product_model');
            $product = $this->Product_model->load($data);

            $this->load->model('basket_item_model');
            $this->basket_id = $data['basket_id'];
            $this->product_id = $product->id;
            $this->qty = $this->input->post('qty');

            $this->db->insert('baskets_items', $this);
        } else {
            $basket_item->qty += $this->input->get('qty');
            $this->db->where('id', $basket_item->id);
            $this->db->update('baskets_items', $basket_item);
        }
    }

    public function load($data)
    {
        $id = $data['id'];
        $basket_id = $data['basket_id'];
        $result = $this->db->from('baskets_items')
            ->where('product_id', $id)
            ->where('basket_id', $basket_id)
            ->limit(1)
            ->get()
            ->result();
        if (empty($result)) {
            return null;
        }
        $result = reset($result);
        $this->id = $result->id;
        $this->basket_id = $result->basket_id;
        $this->product_id = $result->product_id;
        $this->qty = $result->qty;
        return $this;
    }

    public function load_from_basket($data)
    {
        $basket_id = $data['basket_id'];
        $result = $this->db->select('baskets_items.qty,baskets_items.product_id,products.name,products.price')
            ->from('baskets_items')
            ->where('basket_id', $basket_id)
            ->join('products', 'products.id = baskets_items.product_id')
            ->get();
        $result = $result->result_array();

        if (empty($result)) {
            return null;
        }

        return $result;
    }

    public function abate($data)
    {
        $data['id'] = $this->input->get('id');

        $this->load->model('basket_item_model');
        $basket_item = $this->basket_item_model->load($data);

        if ($basket_item == null) {
            $this->load->model('Product_model');
            $product = $this->Product_model->load($data);

            $this->load->model('basket_item_model');
            $this->basket_id = $data['basket_id'];
            $this->product_id = $product->id;
            $this->qty = $this->input->post('qty');

            $this->db->insert('baskets_items', $this);
        } else {
            $basket_item->qty -= $this->input->get('qty');
            $this->db->where('id', $basket_item->id);
            $this->db->update('baskets_items', $basket_item);
        }
    }
}