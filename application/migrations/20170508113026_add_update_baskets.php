<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_update_baskets extends CI_Migration
{

    public function up()
    {
        $field = array(
            'archived' => array('type' => 'boolean'),
            'order' => array(
                'type' => 'INT',
                'constraint' => '9',
                'unsigned' => TRUE
            ),
        );

        $this->dbforge->add_column('baskets',$field);
        echo "successfully";
    }

    public function down()
    {
        $this->dbforge->drop_column('baskets','archived');
        echo "successfully";
    }
}