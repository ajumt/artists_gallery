<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Buyer extends MY_Controller
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
        $this->load->model('Buyer_model');
        $this->load->model('productcategory_model');
        $this->load->model('Seller_model');
    }

    public function index()
    {
        $this->data['products']=$this->Seller_model->getAllseller();
        $this->render('sitedashboard');
    }

    public function myorder()
    {
        $userid=$this->session->userdata('user_id');
        $this->data['product']=$this->Buyer_model->getOrders($userid);
        $this->render('buyer_myorder_view');
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
        $product_data = $this->Buyer_model->get_my_products($seller_id, $limit, $offset);
        $product_data['meta']['page'] = $page;
        $this->data['product'] = $product_data['products'];
        $this->data['meta'] = $product_data['meta'];
        $seller_id = $this->session->userdata('user_id');
        $this->data['category'] = $this->Buyer_model->getMyProductcategory();


        $this->render('my_product_view');
    }


    public function active_biddings()
    {
        $a_bid=$this->Buyer_model->get_Active_bid_details();
        $this->data['active_bid']=$a_bid;
        $this->render('active_bid_details_view');
    }

    public function artists_details()
    {
        if($this->input->post('artist_name')) {
            $name = $this->input->post('artist_name');
            $this->data['artists_name']=$name;
            $artist = $this->Buyer_model->search_artists($name);
        }
        else
            $artist=$this->Buyer_model->artists_details();
        $this->data['artists']=$artist;
        $this->render('artist_details_view');
    }

    public function view_message()
    {
        $userid=$this->session->userdata('user_id');
        $msg=$this->Buyer_model->get_All_messeges($userid);
        //    print_r($msg);
        $this->data['message']=$msg;
        $this->render('buyer_display_message_view');
    }
    public function place_order()
    {
        print_r($_POST);
        $status='Ondemand';
        $data['type']=$status;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('place_order', 'place_order', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->render('buyer_display_message_view');
        } else {
            $artist_id=$this->input->post('msg');
            $address=$this->input->post('address');
            $image_amount = $this->input->post('amt');
            $msg_id=$this->input->post('msg1');
            $data2 = array(
                'user_id'=>$artist_id,
                'total' => $image_amount,
                'address'=>$address,
                'type_id'=>$msg_id,
                'type'=>'Ondemand'
            );
            $this->Buyer_model->insert_order_from_message($artist_id,$data2);

            redirect('buyer/view_message');
        }

    }
    public function set_bid($pid)
    {
//        print_r($pid);
        $uid=$this->session->userdata('user_id');
        $product=$this->Buyer_model->get_All_product($pid,$uid);
//        print_r($product);
        $this->data['product']=$product;
        $this->render('set_bid_view');
    }

    public function put_to_bid($pid)
    {

//        print_r($_POST);

        $uid=$this->session->userdata('user_id');
//        print_r($uid);
        $product=$this->Buyer_model->get_All_product($pid,$uid);
//        print_r($product);
        $this->data['product']=$product;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bid_name', 'bid_name', 'required');
        $this->form_validation->set_rules('start_date', 'end_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('start_time', 'start_time', 'required');
        $this->form_validation->set_rules('end_time', 'end_time', 'required');
        $this->form_validation->set_rules('start_price', 'start_price', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->render('set_bid_view');
        } else {
            $bid_name = $this->input->post('bid_name');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $start_time = $this->input->post('start_time');
            $end_time = $this->input->post('end_time');
            $start_price = $this->input->post('start_price');
            $created_on=date("Y-m-d").','.date("h:i:sa");
            $data = array(
                'bid_name' => $bid_name,
                'start_date' => $start_date.','.$start_time,
                'end_date' => $end_date.','.$end_time,
                'starting_price' => $start_price,
                'product_id'=>$pid,
                'artist_id'=>$this->session->userdata('user_id'),
                'created_on'=>$created_on,

            );
            $this->Buyer_model->insert_bid_data_details($data);
//            redirect('Seller/set_bid');
            redirect('Buyer/put_to_bid/'.$pid);
        }
    }


    public function start_bidding($bid)
    {
        $userid=$this->session->userdata('user_id');

        $bids=$this->Seller_model->get_bid_detail($bid,$userid);
        $this->data['bids']=$bids;

        $s_bid=$this->Seller_model->get_Starting_bid_details($bid);
//        print_r($s_bid);
        $this->data['start_bid']=$s_bid;
        $bid=$this->Seller_model->get_bids($bid);
        $this->data['buyers']=$bid;

        $this->render('starting_bid_details_view');
    }

    public function add_bid_details($bid)
    {
        $userid=$this->session->userdata('user_id');
        $bids=$this->Seller_model->get_Starting_bid_details($bid);
        $this->data['bids']=$bids;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amount', 'amount', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->render('starting_bid_details_view');
        } else {
            $amount=$this->input->post('amount');
            $created_on=$this->input->post('created_on');

            $data = array(
                'bid_id' => $bid,
                'buyer_id' => $userid,
                'amount' => $amount,
                'created_on' => $created_on,

            );
            $this->Seller_model->insert_bid_details($data);

        }
        redirect('Buyer/start_bidding/'.$bid);
    }

    public function completed_bidding($bid,$pid)
    {
        $max_amount_details=$this->Seller_model->get_max_amount($bid);
        $this->data['completed_bid']=$max_amount_details;
        $completed=1;
        $amt=$max_amount_details->max_amount;
        $buyerid=$max_amount_details->buyer_id;

        $data=array(
            'amount' => $amt,
            'aquired_by' => $buyerid,
            'completed' => $completed,
        );
        $this->Seller_model-> update_bid_status($bid,$data);
        $this->render('completed_bid_view');
    }

}