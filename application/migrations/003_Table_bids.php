<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 06-02-2019
 * Time: 14:31
 */
class Migration_Table_bids extends CI_Migration
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
            'bid_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'artist_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'starting_price' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'start_date_time' => array(
                'type' => 'DATE',
            ),
            'end_date_time' => array(
                'type' => 'DATE',
            ),
            'aquired_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'amount' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'created_on' => array(
                'type' => 'DATE',
            ),
            'completed' => array(
                'type' => 'INT',
                'default' => 0,
                'unsigned' => TRUE,
            ),



        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('bids');
    }
    public function down()
    {
        $this->dbforge->drop_table('bids');
    }

}