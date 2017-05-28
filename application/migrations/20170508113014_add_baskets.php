<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_baskets extends CI_Migration
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
            'customer_id' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => TRUE,
            ),
            'total_qty' => array(
                'type' => 'int',
                'constraint' => '9',
                'null' => TRUE,
            ),
            'total_price' => array(
                'type' => 'int',
                'constraint' => '9',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (customer_id) REFERENCES customers(id)');
        $this->dbforge->create_table('baskets');
        echo "successfully";
    }

    public function down()
    {
        $this->dbforge->drop_table('baskets');
    }
}