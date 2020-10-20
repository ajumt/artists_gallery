<?php


class Buyer_model extends CI_Model {
    public function getAllbuyer()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('buyer','buyer.userid=user.id');
        $query = $this->db->get();
        echo $this->db->last_query();
        $result = $query->result();
        return $result;

    }

    public function update_user($id)
    {
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('email');
        $this->db->select('password');
        $this->db->select('state');
        $this->db->select('district');
        $this->db->select('city');
        $this->db->from('buyer');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function insertuserdata($data,$data1)
    {
        $this->db->insert('user',$data);
        $user_id = $this->db->insert_id();
        $data1['userid']=$user_id;
        $this->db->insert('buyer',$data1);

    }

    public function  update_user1($id)
    {
        $this->db->select('*');
        $this->db->from('buyer');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public  function  updateuserdata1($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('buyer',$data);
    }
    function row_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('buyer');
    }


    public function getOrders($userid)
    {

        $this->db->select('*,orders.id as oid,orders.type as otype');
        $this->db->from('order_details');
        $this->db->join('product','product.id=order_details.product_id','left');
        $this->db->join('orders','orders.id=order_details.order_id','left');
        $this->db->join('user','user.id=orders.user_id','left');
        $this->db->where('orders.user_id',$userid);
        $this->db->group_by('orders.id');
        $query=$this->db->get();
        // echo $this->db->last_query();
        $result=$query->result();
        return $result;
    }

    public function get_buyer_product($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('order_details','order_details.product_id=product.id','left');
        $this->db->where('order_id',$id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }

    public function update_buyer_current_status($userid,$data)
    {
        $this->db->where('user_id', $userid);
        $this->db->update('orders',$data);
    }


    public function get_my_products($seller_id,$limit=4,$offset=0,$key=null,$count=false,$category=null)
    {

        $this->db->select('*');
        $this->db->where('seller_id', $seller_id);
        if ($key != null)
            $this->db->like('product_name', $key);
        if (!$count)
            $this->db->limit($limit, $offset);
        if (!$count)

            $query = $this->db->get('product');
        else {
            $total = $this->db->count_all_results('product');
            return $total;
        }
        $result = $query->result();
        $total = $this->get_my_products($seller_id, $limit, $offset, $key, true);
        $meta = array(
            'limit' => $limit,
            'total' => $total,
            'key' => $key
        );
        return array('products' => $result, 'meta' => $meta);
    }

    public function getMyProductcategory()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_Active_bid_details()
    {
        $this->db->select('*,bids.id as bid');
        $this->db->from('bids');
        $this->db->where('completed',0);
        $this->db->join('product','product.id=bids.product_id','left');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }


    public function search_artists($name)
    {
        $this->db->select('*,user.image as aimage');
        $this->db->from('user');
        $this->db->like('first_name',$name);
        $query=$this->db->get();
//        echo $this->db->last_query();
        $result=$query->result();
        return $result;
    }

    public function artists_details()
    {
        $this->db->Select('*,user.image as aimage');
        $this->db->where('type','Artist');
        $this->db->from('user');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function get_All_messeges($userid)
    {
        $this->db->select('*,messages.id as mid,orders.id as order_id,user.id as artist_id');
        $this->db->from('messages');
        $this->db->join('orders','orders.type_id=messages.id AND type="Ondemand"','left');
        $this->db->join('user','user.id=messages.artist_id','left');
        $this->db->where('messages.user_id',$userid);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    public function insert_order_from_message($artist_id,$data2)
    {
       $this->db->where('user_id',$artist_id);
        // $this->db->delete('orders');
        $this->db->insert('orders',$data2);


    }
    public function get_All_product($pid,$uid)
    {
        $this->db->select('*,product.image as pimage');
        $this->db->from('product');
        $this->db->where('seller_id',$uid);
        $this->db->where('id',$pid);
        $query=$this->db->get();
        $this->db->last_query();
        $result=$query->row();
        return $result;
    }

    public function insert_bid_data_details($data)
    {
        $this->db->insert('bids',$data);
    }


}