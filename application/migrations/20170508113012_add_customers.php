<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_customers extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
                'unique' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('customers');
        echo "successfully";
    }

    public function down()
    {
        $this->dbforge->drop_table('customers');
    }
}