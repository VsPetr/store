<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_products extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '9',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'unique' => TRUE,
            ),
            'specification' => array(
                'type' => 'text',
                'null' => FALSE,
            ),
            'quantity' => array(
                'type' => 'int',
                'constraint' => '9',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('products');
        $this->dbforge->add_field( array(
            'price' => array(
                'type' => 'INT',
                'constraint' => '9',
                'null' => false,
            ),
        ));
        echo "successfully";
    }

    public function down()
    {
        $this->dbforge->drop_table('products');
    }
}