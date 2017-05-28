<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

class Product_model extends CI_Model
{
    public $id;
    public $name;
    public $specification;
    public $price;
    public $quantity;

    public function create(){
        $this->name = $this->input->post('name');
        $this->specification = $this->input->post('specification');
        $this->price = $this->input->post('price');
        $this->quantity = $this->input->post('quantity');

        $this->db->insert('products', $this);
    }

    public function load($data)
    {
        $id = $data['id'];
        $result = $this->db->from('products')
            ->where('id', $id)
            ->limit(1)
            ->get()
            ->result();
        if (empty($result)) {
            return null;
        }
        $result = reset($result);
        $this->id = $result->id;
        $this->name = $result->name;
        $this->specification = $result->specification;
        $this->price = $result->price;
        $this->quantity = $result->quantity;
        return $this;
    }

    public function load_all(){
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function update(){
        $this->id = $this->input->post('id');
        $this->name = $this->input->post('name');
        $this->specification = $this->input->post('specification');
        $this->price = $this->input->post('price');
        $this->quantity = $this->input->post('quantity');

        $this->db->where('id',$this->id)
            ->update('products', $this);
    }
    public function delete($result){
        $data['id'] = $result['id'];
        $this->load->model('product_model');
        $this->product_model->load($data);

        $this->db->where('id',$this->id);
        $this->db->delete('products', $this);
    }
}

