<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_price_to_products extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_column('products', array(
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
        $this->dbforge->drop_column('products', 'price');
    }
}
