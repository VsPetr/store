<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_baskets_items extends CI_Migration
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
            'basket_id' => array(
                'type' => 'INT',
                'constraint' => '9',
                'unsigned' => TRUE,
            ),
            'product_id' => array(
                'type' => 'int',
                'constraint' => '9',
                'unsigned' => TRUE,
            ),
            'qty' => array(
                'type' => 'int',
                'constraint' => '9',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (basket_id) REFERENCES baskets(id)');
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (product_id) REFERENCES products(id)');
        $this->dbforge->create_table('baskets_items');
        echo "successfully";
    }

    public function down()
    {
        $this->dbforge->drop_table('baskets_items');
    }
}