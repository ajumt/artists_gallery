<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 06-02-2019
 * Time: 14:31
 */
class Migration_Table_messages extends CI_Migration
{

    public function up()
    {
//table_user

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'subject' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'message' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'file' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('messages');
    }
    public function down()
    {
        $this->dbforge->drop_table('messages');
    }

}