<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->model('Product_model');
    }
    public function index()
    {
        $data2['product']='';
        $res=$this->Product_model->getAllproduct();
        $data2['product']=$res;
            $this->render("Product_view");

    }
    public function add_product()
    {
        $this->data['parent'] = '';
        $res2= $this->Product_model->get_parent_dropdown();
        $this->data['parent']=$res2;
           $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name', 'product_name', 'required');
        $this->form_validation->set_rules('product_type', 'product_type', 'required');
        $this->form_validation->set_rules('product_price', 'product_price', 'required');
        $this->form_validation->set_rules('product_quantity', 'product_quantity', 'required');
        $this->form_validation->set_rules('product_des', 'product_des', 'required');
          if ($this->form_validation->run() == FALSE) {
            $this->render("add_product");
        }
          else {
              $product_name = $this->input->post('product_name');
              
              $product_cat_type = $this->input->post('product_type');
              $product_price = $this->input->post('product_price');
              $product_quantity = $this->input->post('product_quantity');
              $product_property_name = $this->input->post('product_property_name');
              $product_property = $this->input->post('product_property');
              $product_des = $this->input->post('product_des');
              $seller_id=$this->session->userdata('user_id');
              $data = array(
                  'product_name' => $product_name,
                  'product_cat_type' => $product_cat_type,
                  'product_price' => $product_price,
                  'product_quantity' => $product_quantity,
                  'description' => $product_des,
                  'seller_id' =>$seller_id,

              );
              $data1['product_property_name']=$product_property_name;
              $data1['product_property']=$product_property;
              $imgdata= $this->upload_product_image();

              if(is_array ($imgdata))
              {
                  $data['image'] = $imgdata['file_name'];
              }
              else
              {
                  echo $imgdata;
              }

             $dat = $this->Product_model->insertuserdata($data,$data1);

             redirect('seller/product_details/'.$dat);
          }
    }

    public function upload_product_image()
    {
        $config['upload_path']          = './media/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';



        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $data = $this->upload->display_errors();

        }
        else
        {
            $data =$this->upload->data();

        }
        return $data;

    }

    public function edit_product($id)
    {
        $res1=$this->Product_model->update_user1($id);
        $this->data['users']=$res1;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name','product_name','required');
        $this->form_validation->set_rules('product_cat_name','product_cat_name','required');
        $this->form_validation->set_rules('product_price','product_price','required');
        $this->form_validation->set_rules('product_quantity','product_quantity','required');

        if ($this->form_validation->run()==FALSE)
        {
            $this->render('edit_product_view');
        }
        else
        {
            $product_name = $this->input->post('product_name');
            $product_cat_name = $this->input->post('product_cat_name');
            $product_price = $this->input->post('product_price');
            $product_quantity = $this->input->post('product_quantity');
            $data = array(
                          'product_name' => $product_name,
                          'product_cat_type' => $product_cat_name,
                          'product_price' => $product_price,
                          'product_quantity' => $product_quantity,
                          'seller_id' =>$this->session->userdata('user_id')
        );

            $this->Product_model->updateuserdata1($data,$id);
            redirect('Artist');
        }
    }
    public function delete_product($id)
    {
        $this->Product_model->row_delete($id);
        redirect('Artist');

    }



    public function get_subproduct($prod_id,$selected='')
    {
        print_r($selected);
        $products = $this->Product_model->get_subproduct($prod_id);
        $products_options = array(0 => '-Select Option-');
        foreach ($products as $res) {
            $products_options[$res['id']] = $res['procat_name'];
        }

        $item = form_dropdown('subcat', $products_options, $selected, 'data-default-value = "'.$selected.'" class="form-control"');

        echo $item;

    }

}