<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 31-01-2019
 * Time: 15:00
 */
class Migration_initial_migration extends CI_Migration {

    public function up()
    {
//table_user

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'type' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'mobile_number' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'city' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'district' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'pin' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');

//table_art_category

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'art_category_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('art_category');


//table_cart

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_qty' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('cart');


//table_comment

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'product_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'comment' => array(
                'type' => 'TEXT',
                'unsigned' => TRUE,
            ),
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'created_on' => array(
                'type' => 'DATETIME',
                'unsigned' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('comment');

//table_order_details

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'order_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'quantity' => array(
                'type' => 'INT',
                'default' => 1,
                'unsigned' => TRUE,
            ),
            'status' => array(
                'type' => 'INT',
                'default' => 0,
                'unsigned' => TRUE,
            ),
            'shiped_date' => array(
                'type' => 'DATE',
                'unsigned' => TRUE,
            ),
            'delivered_date' => array(
                'type' => 'DATE',
                'unsigned' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('order_details');


//table_orders

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'payment_type' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'total' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => 0,
            ),
            'account_no' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'card_no' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'cvv' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'ship_date' => array(
                'type' => 'DATE',
                'unsigned' => TRUE,
            ),

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('orders');

//table_product

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'product_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'product_cat_type' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_quantity' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_price' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'seller_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'description' => array(
                'type' => 'TEXT',
                'unsigned' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('product');

//table_product_category

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'procat_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'procat_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'parent' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),


        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('product_category');

//table_product_property

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'product_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_property_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'product_property' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('product_property');
    }

    public function down()
    {
//        $this->dbforge->drop_table('user');
//        $this->dbforge->drop_table('art_category');
//        $this->dbforge->drop_table('cart');
//        $this->dbforge->drop_table('comment');
//        $this->dbforge->drop_table('order_details');
//        $this->dbforge->drop_table('orders');
//        $this->dbforge->drop_table('product');
//        $this->dbforge->drop_table('product_category');
//        $this->dbforge->drop_table('product_property');

    }
}
