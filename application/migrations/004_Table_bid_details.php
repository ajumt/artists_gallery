<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 06-02-2019
 * Time: 14:31
 */
class Migration_Table_bid_details extends CI_Migration
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
            'bid_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'buyer_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'amount' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'created_on' => array(
                'type' => 'DATE',
            ),
            'REMARKS' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('bid_details');
    }
    public function down()
    {
        $this->dbforge->drop_table('bid_details');
    }
}