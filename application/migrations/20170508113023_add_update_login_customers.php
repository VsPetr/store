<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_update_login_customers extends CI_Migration
{

    public function up()
    {
        $this->dbforge->modify_column('customers',
            array('login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE,
                'null' => false,))
        );
        echo "successfully";
    }

    public function down()
    {
        $this->dbforge->modify_column('customers', array(
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE,
                )
        ));
    }
}
