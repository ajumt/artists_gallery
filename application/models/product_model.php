<?php


class Product_model extends CI_Model {
    public function getAllProduct()
    {
        $this->db->select('*');
        $this->db->from('product');
        $query = $this->db->get();
         $result = $query->result();
        return $result;
    }
    public function update_user($id)
    {
        $this->db->select('procat_name');
        $this->db->select('procat_code');
        $this->db->from('product');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function insertuserdata($data,$data1)
    {
        $this->db->insert('product',$data);
       $product_id = $this->db->insert_id();

        $product_data=array();
        $properties=array();
        if(is_array($data1['product_property'])&&count($data1['product_property'])>0){
            for($i=0;$i<count($data1['product_property']);$i++){
                $row3=array();
                $row3['product_id']=$product_id;
                $row3['product_property_name']=$data1['product_property_name'][$i];
                $row3['product_property']=$data1['product_property'][$i];
                $properties[]=$row3;
            }
            $this->db->insert_batch('product_property',$properties);
        }
        return $product_id;

    }
    public function getParent()
    {
        $this->db->select('*');

        $this->db->from('product_category');
        $this->db->where('parent',0);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_parent_dropdown()
    {
        $res=$this->getParent();
        $parent_option=array(0 =>'-Root Category-');
            foreach($res as $item)
            {
                $parent_option[$item->id]=$item->procat_name;
            }
//        print_r($parent_option);
        return $parent_option;
    }

    public function  update_user1($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.id=product.product_cat_type','left');
        $this->db->where('product.id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public  function  updateuserdata1($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('product',$data);
    }
    function row_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }

    public function get_subproduct($prod_id){
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('parent',$prod_id);
        $query = $this->db->get('');
        return $query->result_array();

    }

       public function getAllproducts()
       {
        $this->db->select('*,product.image as pimage');
        $this->db->from('product');
        $this->db->join('user','user.id=product.seller_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
       }
}