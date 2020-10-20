<?php


class Productcategory_model extends CI_Model {
    public function getAllProductcategory()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $query = $this->db->get();
         $result = $query->result();
        return $result;
    }

    public function update_user($id)
    {
        $this->db->select('procat_name');
        $this->db->select('procat_code');
        $this->db->from('product_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function insertuserdata($data)
    {
        $this->db->insert('product_category',$data);
    }

    public function parent()
    {
        $this->db->select('*');
        $this->db->where('parent',0);
        $this->db->from('product_category');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }


    public function getProductCategoriesOfParent($parent=0)
    {
        $this->db->select('*');
        $this->db->where('parent',$parent);
        $this->db->from('product_category');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_parent_dropdown()
    {
        $res=$this->getProductCategoriesOfParent();
        $parent_option=array(0 =>'-Root Category-');
            foreach($res as $item)
            {
                $parent_option[$item->id]=$item->procat_name;
            }
        return $parent_option;
    }

    public function  update_user1($id)
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public  function  updateuserdata1($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('product_category',$data);
    }

    public  function getRootProductCategory()
    {

        $this->db->select('*');
        $this->db->where('parent',0);
        $this->db->from('product_category');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public  function getSubProductCategory($id)
    {
        $this->db->select('*');
        $this->db->where('parent',$id);
        $this->db->from('product_category');
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    public function get_shop_products($user=null,$limit=4,$offset=0,$key=null,$count=false,$category=null)
    {
        if($category!=null) 
            $this->db->orWhereIn('product_cat_type', $category);
        $this->db->select('*');
        if ($key != null)
            $this->db->like('product_name', $key);
        if (!$count)
            $this->db->limit($limit, $offset);
        if($user!=null){
            if(isset($user['type'])&&$user['type']=='Artist'){
                $this->db->where('seller_id!=',$user['user_id']);
            }
        }
        if (!$count)
            $query = $this->db->get('product');
        
        else {
            $total = $this->db->count_all_results('product');
            return $total;
        }
        $result = $query->result();
        $total = $this->get_shop_products($user,$limit, $offset, $key, true);
        $meta = array(
            'limit' => $limit,
            'total' => $total,
            'key' => $key
        );
        return array('products' => $result, 'meta' => $meta);
    }

        public function display_product_categories()
        {
            $data=array();
            $res=$this->getProductCategoriesOfParent();
            foreach($res as $item)
            {
                $childrens=$this->getProductCategoriesOfParent($item->id);
                $item->childrens=$childrens;
                $data[]=$item;
            }
            return $data;
        }
    function row_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product_category');
        $this->db->where('parent', $id);
        $this->db->delete('product_category');
    }

}