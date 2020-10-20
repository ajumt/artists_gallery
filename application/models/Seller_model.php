<?php


class Seller_model extends CI_Model {
    public function getAllseller()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->group_by('product_name');
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    public function getAllseller1($userid)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('product','product.seller_id=user.id');
        $this->db->where('product.seller_id',$userid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function getComment($product_id)
    {
        $this->db->select('*');
        $this->db->from('comment');
        $this->db->where('product_id',$product_id);
        $query = $this->db->get();

        $result = $query->row();
        return $result;

    }

    public function getAllsellers($id)
    {

        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function getAllcomment($id)
    {

        $this->db->select('*,comment.id as id');
        $this->db->from('comment');
        $this->db->join('user','user.id=comment.userid');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
//        echo $this->db->last_query();
        $result = $query->result();
        return $result;
    }

    public function update_user($id)
    {
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('email');
        $this->db->select('password');
        $this->db->select('product_name');
        $this->db->select('product_quantity');
        $this->db->select('product_price');
        $this->db->from('seller');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function insertuserdata($data,$data1,$data2)
    {
        $this->db->insert('user',$data);
        $this->db->insert('seller',$data1);
        $seller_id = $this->db->insert_id();

        $product_data=array();
        $properties=array();
        for($i=0;$i<count($data2['product_property']);$i++){
            $row3=array();
            $row3['product_id']=$seller_id;
            $row3['product_property_name']=$data2['product_property_name'][$i];
            $row3['product_property']=$data2['product_property'][$i];
            $properties[]=$row3;
        }
        $this->db->insert_batch('product_property',$properties);
        return $seller_id;

    }
    public function userreg($data)
    {
        $this->db->insert('user', $data);
    }
    public function  update_user1($id)
    {
        $this->db->select('*');
        $this->db->from('seller');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public  function  updateuserdata1($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('seller',$data);
    }
    function row_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('seller');
    }

    public function comment($data)
    {
        $this->db->insert('comment', $data);
    }



    public function getMyProductcategory()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_my_products($seller_id,$limit=4,$offset=0,$key=null,$count=false)
    {
        $this->db->select('*');
        $this->db->where('seller_id',$seller_id);

//        $this->db->join('bids','bids.product_id=product.id');

        if($key!=null)
            $this->db->like('product_name',$key);
        if(!$count)
            $this->db->limit($limit,$offset);
        if(!$count)

            $query = $this->db->get('product');
        else {
            $total = $this->db->count_all_results('product');
            return $total;
        }
        $result = $query->result();
        $total = $this->get_my_products($seller_id,$limit,$offset,$key,true);
        $meta=array(
            'limit'=>$limit,
            'total'=>$total,
            'key' =>$key
        );
        return array('products'=>$result,'meta'=>$meta);
    }

    public function check_cart_item($id,$userid)
    {
        $this->db->where('product_id',$id);
        $this->db->where('user_id',$userid);
        $query=$this->db->get('cart');
//        print_r($query);
        if($query->num_rows()== 1)
        {
            return $query->row();
//
        }
        else{
            false;
        }

    }
    function cart_insert($data)
    {
        $this->db->insert('cart',$data);
        echo $this->db->last_query();
    }

    public function display_shopping_cart($userid)
    {
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->join('product','product.id=cart.product_id');
        $this->db->where('cart.user_id',$userid);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    public function insert_checkout_details($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $query = $this->db->get('orders');
        $row= $query->row();
        if ($query->num_rows() == 1) {
            $this->db->where('user_id', $data['user_id']);
            $this->db->delete('orders');

            $this->db->where('order_id',$row->id);
            $this->db->delete('order_details');
        }


        $this->db->insert('orders',$data);
        $order_id=$this->db->insert_id();
        return $order_id;
    }
    public function getAddress($userid)
    {
        $this->db->select('*');
        $this->db->from('user');
//        $this->db->join('user','user.id=orders.user_id');
        $this->db->where('id',$userid);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }
    public function getProducts($userid)
    {
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->join('product','product.id=cart.product_id');
        $this->db->where('cart.user_id',$userid);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    public function updaye_qty($data,$product_id,$userid)
    {
        $this->db->where('cart.product_id',$product_id);
        $this->db->where('cart.user_id',$userid);
        $this->db->update('cart',$data);
    }

    public function insert_cart_order($product_details,$order_id){
        $cart_order =array();
        foreach($product_details as $item){
            $row=array('order_id'=>$order_id,'product_id'=>$item->product_id,'quantity'=>$item->product_qty);
            $cart_order[]=$row;
        }
        $this->db->insert_batch('order_details',$cart_order);

    }
    public function getProduct($userid)
    {
        $this->db->select('*,orders.id as oid');
        $this->db->from('product');
        $this->db->join('order_details','order_details.product_id=product.id','right');
        $this->db->join('orders','orders.id=order_details.order_id','left');

        $this->db->join('user','user.id=orders.user_id','left');
        $this->db->where('orders.id',$userid);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    public function change_status($order_id,$data)
    {
        $this->db->where('orders.id',$order_id);
        $this->db->update('orders',$data);
    }

    public function getUser($userid){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.id',$userid);
        $query=$this->db->get();
        $result=$query->result();
        return $result;

    }
    public function getProduct_status($id)
    {


    }
    public function getOrders($userid)
    {

        $this->db->select('*,orders.id as oid,sum(quantity*product_price) as grand_total,order_details.status as orderstatus');
        $this->db->from('order_details');
        $this->db->join('product','product.id=order_details.product_id','left');
        $this->db->join('orders','orders.id=order_details.order_id','left');
        $this->db->join('user','user.id=orders.user_id','left');
        $this->db->where('product.seller_id',$userid);
        $this->db->group_by('orders.id');
        $this->db->order_by("order_details.status", "asc");
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function get_user_address($id){
        $this->db->select('*,orders.id as oid,');
        $this->db->from('orders');
        $this->db->where('orders.id',$id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function update_status($id,$data2)
    {
        $this->db->where('order_details.order_id',$id);
        $this->db->update('order_details', $data2);
    }

    public function insert_art_category($data)
    {
        $this->db->insert('art_category',$data);
    }
    public function getArt_categories()
    {
        $this->db->Select('*');
        $this->db->from('art_category');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function  update_art_category($id,$data)
    {
        $this->db->where('art_category.id',$id);
        $this->db->update('art_category', $data);
    }
    public function select_art_category_details($id)
    {
        $this->db->Select('*');
        $this->db->from('art_category');
        $this->db->where('art_category.id',$id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }
    public function delete_art_category($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('art_category');
    }

    public function display_seller_details()
    {
        $this->db->Select('*');
        $this->db->where('type','Artist');
        $this->db->from('user');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    public function display_buyer_details()
    {
        $this->db->Select('*');
        $this->db->where('type','Buyer');
        $this->db->from('user');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function display_user_details($id)
    {
        $this->db->select('*,user.image as uimage');
        $this->db->from('user');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }
    public function display_buyer_user_details($id)
    {
        $this->db->select('*,user.image as bimage');
        $this->db->from('user');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }


    public function individual_artist_details($id)
    {
        $this->db->select('*,user.image as aimage');
        $this->db->from('user');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }

    public function individual_artist_gallery($id)
    {
        $this->db->select('*,product.image as pimage');
        $this->db->from('product');
        $this->db->where('seller_id',$id);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function insert_messages($data)
    {
        $this->db->insert('messages',$data);
    }

    public function get_messeges($userid)
    {
        $this->db->select('*,messages.id as mid');
        $this->db->from('messages');
        $this->db->join('orders','orders.type_id=messages.id','left');
        $this->db->where('artist_id',$userid);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function update_current_status($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('messages', $data);
    }

    public function update_current_status1($mid,$data)
    {
        print_r($data);
        $this->db->where('id',$mid);
        $this->db->update('messages', $data);
    }

    public function get_Allmesseges()
    {
        $this->db->select('*');
        $this->db->from('messages');
//        $this->db->join('product','product.seller_id=messages.artist_id');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function update_place_holder_status($artist_id,$data1)
    {
        $this->db->where('user_id',$artist_id);
        $this->db->update('orders',$data1);
    }

    public function update_place_holder_type($artist_id,$data)
    {
        $this->db->where('user_id',$artist_id);
        $this->db->update('orders',$data);
    }

    public function updateartist_current_status1($oid,$data)
    {
        $this->db->where('order_id',$oid);
        $this->db->update('order_details',$data);
    }

    public function getShipped_product_details($userid)
    {
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->join('product','product.id=order_details.product_id');
        $this->db->join('orders','orders.user_id=product.seller_id');
        $this->db->where('status',1);
        $this->db->where('user_id',$userid);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }


    public function update_image_amount($artist_id,$data2)
    {
        $this->db->where('user_id',$artist_id);
        $this->db->update('orders',$data2);
    }

    public function insert_image_details($artist_id,$data2)
    {
       $this->db->where('user_id',$artist_id);
        // $this->db->delete('orders');
        $this->db->insert('orders',$data2);


    }

    public function update_imagetotal_amount($id,$data1)
    {
        $this->db->where('user_id',$id);
        $this->db->update('orders',$data1);

    }

    public function update_current_status11($type_id, $data)
    {
        $this->db->where('id',$type_id);
        $this->db->update('messages', $data);
    }

    public function delete_message($mid)
    {
        $this->db->where('id',$mid);
        $this->db->delete('messages');
    }

    public function delete_user($id)
    {
        $this->db->trans_start();
        $this->db->where('user_id',$id);
        $this->db->delete('messages');
        $this->db->where('id',$id);
        $this->db->delete('user');
        $this->db->trans_complete();
    }

    public function get_buyer_details($userid)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id',$userid);
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function edit_user_profile($id,$data)
    {

        $this->db->where('id',$id);
        $this->db->update('user',$data);

    }

    public function get_user_details($id)
    {
        $this->db->select('*');
        $this->db->from('User');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }

    public function change_password($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }



    public function insert_bid_data_details($data)
    {
        $this->db->insert('bids',$data);
    }

    public function get_Allactivebid_details()
    {
        $this->db->select('*');
        $this->db->from('bids');
        $this->db->where('completed',0);
        $this->db->join('product','product.id=bids.product_id','left');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function get_Allcompletedbid_details()
    {
        $this->db->select('*');
        $this->db->from('bids');
        $this->db->where('completed',1);
        $this->db->join('product','product.id=bids.product_id','left');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }



    public function get_Starting_bid_details($bid)
    {
        $this->db->select('*,bids.id as bid1');
        $this->db->from('bids');
        $this->db->join('product','product.id=bids.product_id','left');
        $this->db->where('bids.id',$bid);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }

    public function insert_bid_details($data)
    {
        $this->db->insert('bid_details',$data);
    }


    public function get_bids($bid)
    {
        $this->db->select('*,max(amount) as max_amount,bid_id as bid1');
        $this->db->from('bid_details');
        $this->db->join('user','user.id=bid_details.buyer_id');
        $this->db->where('bid_details.bid_id',$bid);
        $this->db->group_by('bid_details.id');
        $this->db->order_by('max_amount','desc');
        $query=$this->db->get();
//        echo $this->db->last_query();
        $result=$query->result();
        return $result;
    }

    public function cart_product_delete($id)
    {
        $this->db->where('product_id',$id);
        $this->db->delete('cart');
    }

    public function delete_comment($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('comment');
    }

    public function update_bid_status($bid,$data)
    {
        $this->db->where('id',$bid);
        $this->db->update('bids',$data);
    }
    public function activate_user($id)
    {
        $this->db->where('id',$id);
        $this->db->update('user',['active'=>1]);
    }
    public function deactivate_user($id)
    {
        $this->db->where('id',$id);
        $this->db->update('user',['active'=>0]);
    }

    public function get_bid_details($bid)
    {
        $this->db->select('*,max(amount) as max_amount');
        $this->db->from('bid_details');
        $this->db->where('bid_details.bid_id',$bid);
        $query=$this->db->get();
        echo $this->db->last_query();
        $result=$query->row();
        return $result;
    }

    public function get_max_amount($bid)
    {
        $this->db->select('*,max(bid_details.amount) as max_amount,user.image as buyer_image');
        $this->db->from('bid_details');
        $this->db->join('user','user.id=bid_details.buyer_id','left');
        $this->db->join('bids','bids.id=bid_details.bid_id','left');
        $this->db->join('product','product.id=bids.product_id','left');
        $this->db->where('bid_details.bid_id',$bid);
        $query=$this->db->get();
//        echo $this->db->last_query();
        $result=$query->row();
        return $result;
    }

    public function get_bid_detail($bid,$userid)
    {
        $this->db->select('*,bid_details.amount as amnt');
        $this->db->from('bid_details');
        $this->db->join('user','user.id=bid_details.buyer_id','left');
        $this->db->join('bids','bids.id=bid_details.bid_id','left');
        $this->db->where('bid_details.bid_id',$bid);
        $this->db->where('bid_details.buyer_id',$userid);
//        $this->db->group_by('buyer_id');
        $this->db->order_by('bids.created_on','desc');
        $query=$this->db->get();
//        echo $this->db->last_query();
        $result=$query->result();
        return $result;
    }
}