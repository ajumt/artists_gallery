<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productcategory extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        if (!$this->session->userdata('currently_logged_in')) {
            redirect('Main');
        }
        $this->load->model('Productcategory_model');
        $this->load->model('product_model');
    }
    public function index()
    {
        $data['parent'] = '';
        $res2= $this->Productcategory_model->get_parent_dropdown();
        $this->data['parent']=$res2;

        $rootcategories = $this->Productcategory_model->getRootProductCategory();
        $product_categories=array();
        foreach($rootcategories as $root)
        {
            $row= array(
                'details'=>$root,
                'childrens'=>$this->Productcategory_model->getSubProductCategory($root->id),
      );

            $product_categories[]=$row;
        }
        $this->data['productcategory'] = $product_categories;
        $this->render("Productcategory_view");
    }
    public function add_product_category()
    {
        $data['parent'] = '';
        $res2= $this->Productcategory_model->get_parent_dropdown();
        $this->data['parent']=$res2;
           $this->load->library('form_validation');
        $this->form_validation->set_rules('procat_name', 'procat_name', 'required');
        $this->form_validation->set_rules('procat_code', 'procat_code', 'required');
          if ($this->form_validation->run() == FALSE) {

              $this->render('add_productcategory');
        }
          else {
              $procat_name = $this->input->post('procat_name');
              $procat_code = $this->input->post('procat_code');
              $parent = $this->input->post('parent_id');

              $data = array(
                  'procat_name' => $procat_name,
                  'procat_code' => $procat_code,
                  'parent' => $parent,
              );
              $this->Productcategory_model->insertuserdata($data);
              redirect('Productcategory/display_product_category');
          }
    }
    public  function  update($id)
    {
        $res1=$this->Productcategory_model->update_user1($id);
        $this->data['users']=$res1;
        $this->render("edit_Productcategory_view");
    }
    public function edit_productcategory($id)
    {

        $res1=$this->Productcategory_model->update_user1($id);
        $this->data['users']=$res1;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('procat_name','procat_name','required');
        $this->form_validation->set_rules('procat_code','procat_code','required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->render("edit_Productcategory_view");

        }
        else
        {
            $procat_name = $this->input->post('procat_name');
            $procat_code = $this->input->post('procat_code');

            $id = $this->input->post('num');

            $data = array('id' => $id,
                          'procat_name' => $procat_name,
                          'procat_code' => $procat_code,

        );
            $this->Productcategory_model->updateuserdata1($data, $id);
            redirect('Productcategory/index',$data);
        }
    }

    public  function view_product()
    {
        $res1=$this->product_model->getAllproducts();
        $this->data['product']=$res1;
        $this->render('products_view');
    }

    public function display_product_category()
    {
        $parent=$this->Productcategory_model->display_product_categories();
        $this->data['parent']=$parent;
        $this->render('display_product_category_view');
    }

    public function delete_productcategory($id)
    {
        $this->Productcategory_model->row_delete($id);
        redirect('Productcategory/display_product_category');

    }

}