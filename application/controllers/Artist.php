<?php

class Artist extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->model('productcategory_model');
        $this->load->model('Artist_model');
    }

    public function index()
    {
        $res1 = $this->Artist_model->getAllseller();
        $this->data['product'] = $res1;
        $this->data['seller'] = '';
        $userid = $this->session->userdata('user_id');
        $res = $this->Artist_model->getAllseller1($userid);
        $this->data['seller'] = $res;
        $this->render("seller_view");
    }

    public function my_product_view($page = 1)
    {
        $seller_id = $this->session->userdata('user_id');
        if ($page <= 0) redirect('site/shop/1');
        $page = $page - 1;
        $offset = 0;
        $limit = 4;
        if ($this->input->get('limit'))
            $limit = $this->input->get('limit');
        if ($this->input->get('key'))
            $key = $this->input->get('key');
        $offset = $page * $limit;
        $product_data = $this->Artist_model->get_my_products($seller_id, $limit, $offset);
        $product_data['meta']['page'] = $page;
        $this->data['product'] = $product_data['products'];
        $this->data['meta'] = $product_data['meta'];
        $seller_id = $this->session->userdata('user_id');
        $this->data['category'] = $this->Artist_model->getMyProductcategory();


        $this->render('my_product_view');
    }


    public function active_bid()
    {
        $bid=$this->Artist_model->get_Allactivebid_details();
        $this->data['bids']=$bid;
        $this->render('active_bids_view');
    }

    public function myorder()
    {
        $userid=$this->session->userdata('user_id');
        $this->data['product']=$this->Artist_model->getOrders($userid);

        $oid=$this->input->post('orderid');
        $this->render('myorder_view');
    }

    public function Shipments()
    {   $userid=$this->session->userdata('user_id');
        $products=$this->Artist_model->getShipped_product_details($userid);
    //    print_r($products);
        $this->data['products']=$products;
        $this->render('shipment_view');
    }

    public function view_message()
    {
        $userid=$this->session->userdata('user_id');
        $msg=$this->Artist_model->get_messeges($userid);
        $this->data['message']=$msg;
        $this->render('display_message_view');

    }

    public function completed_bid()
    {
        $bid=$this->Artist_model->get_Allcompletedbid_details();
        $this->data['complete']=$bid;
        $this->render('completed_bids_view');
    }
}