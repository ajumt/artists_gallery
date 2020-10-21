<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->model('productcategory_model');
        $this->load->model('Seller_model');
    }
      public function index()
    {
        // print_r($this->session->userdata());
        $this->data['products']=$this->Seller_model->getAllseller($this->session->userdata());
        $this->render('sitedashboard');
    }
    public function shop($page=1)
    {

        if($page<=0) redirect('site/shop/1');
        $page = $page-1;
        $offset=0; $limit=4;
        if($this->input->get('limit'))
            $limit = $this->input->get('limit');
        if($this->input->get('key'))
            $key = $this->input->get('key');
        $offset = $page*$limit;
        $category=isset($_GET['cats'])?$_GET['cats']:[];
        $product_data = $this->productcategory_model->get_shop_products($this->session->userdata(),$limit,$offset,$category);
        $product_data['meta']['page']=$page;
        $this->data['shop_products']= $product_data['products'];
        $this->data['meta']= $product_data['meta'];
        $this->data['category']=$this->productcategory_model->getAllProductcategory();

        $this->render('shop');
    }

    public function cart($id=null,$quantity=1)
    {
        $userid=$this->session->userdata('user_id');
        if($id!=null){

            $data=array(
                'user_id' => $this->session->userdata('user_id'),
                'product_id' => $id,
                'product_qty' => $quantity
            );
//            print_r($data);
            // $check = $this->Seller_model->check_cart_item($id,$userid);

            // if($check==FALSE){
                $this->data['cart_item']=$this->Seller_model->cart_insert($data);
                redirect('site/cart');
            // }
        }

        $this->data['cart']=$this->Seller_model->display_shopping_cart($userid);
        $this->render('cart');
    }
    public function checkout($val=null)
    {
        $userid=$this->session->userdata['user_id'];
        $curr_address=$this->Seller_model->getAddress($userid);
        $this->data['sum']=$val;
        $this->data['current']=$curr_address;
        $this->load->library('form_validation');

        $this->form_validation->set_rules('submit','submit','required');
        if($this->form_validation->run()== FALSE)
        {
            $this->render('checkout');
        }

        else{
            $userid=$this->session->userdata('user_id');
            $credit=$this->input->post('debit');
            $address=$this->input->post('address');
            $bank=$this->input->post('bank');
            $card_no=$this->input->post('card_no');
            $cvv=$this->input->post('cvv');
            if($credit){
                $price='credit/debit';
            }
            else{
                $price='cash';
            }

            $data1=array(
                  'address'=> $address,
                  'user_id'=>$userid,
                  'payment_type'=>$price,
                  'total'=>$val,
                  'account_no'=>$bank,
                  'card_no'=>$card_no,
                  'cvv'=>$cvv,
            );
            $order_id=$this->Seller_model->insert_checkout_details($data1);
            $userid= $this->session->userdata('user_id');
            $product_details=$this->Seller_model->getProducts($userid);
            $this->Seller_model->insert_cart_order($product_details,$order_id);
            $this->Seller_model->emptyCart($userid);
            redirect('Site/index');
        }
    }
    public function signin()
    {

        $gender = array(
            '0' => '-Select Gender-',
            'Female' => 'Female',
            'Male' => 'Male'
        );
        $artists=array(
            '0'=> '--Artists Category--',
            'Painting' => 'painting'
        );
        $this->data['gender']=$gender;
        $this->data['artists']=$artists;
        $this->render('user_register');
    }

    public function product_status_view($id)
    {
        $this->data['address']=$this->Seller_model->get_user_address($id);
        $this->data['orders']=$this->Seller_model->getProduct($id);
        $this->data['orderid']=$id;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shipdate','shipdate','required');
        $this->form_validation->set_rules('deliverd_date','deliverd_date','required');
        if($this->form_validation->run()== FALSE)
        {
            $this->render('curent_status_view');
        }
       else{
           $shipdate=$this->input->post('shipdate');
           $deliverd_date=$this->input->post('deliverd_date');
           $data2=array(
                  'shiped_date'=>$shipdate,
                  'delivered_date'=>$deliverd_date,
                  'status'=>1
           );
           $this->Seller_model->update_status($id,$data2);
           redirect('Artist/shipments');
       }
    }

    public function art_category()
    {
        $art_categories=$this->Seller_model->getArt_categories();
        $this->data['category']=$art_categories;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('art_category_name','art_category_name','required');
        $this->form_validation->set_rules('add','add','required');
        if($this->form_validation->run()==FALSE)
        {
            $this->render('art_category_view');
        }
        else{
            $category=$this->input->post('art_category_name');
            $data=array(
            'art_category_name'=>$category
            );

            $this->Seller_model->insert_art_category($data);
            redirect('site/art_category');
        }
    }

    public function update_art_category($id)
    {
        $art_category=$this->Seller_model->select_art_category_details($id);
        $this->data['art_category']=$art_category;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('art_category_name','art_category_name','required');
        if($this->form_validation->run()==FALSE)
        {
            $this->render('update_art_category_view');
        }
        else {
            $category = $this->input->post('art_category_name');
            $data = array(
                'art_category_name' => $category
            );

            $this->Seller_model->update_art_category($id,$data);
            redirect('site/art_category');
        }
    }

    public function delete_art_category($id)
    {
        $this->Seller_model->delete_art_category($id);
        redirect('site/art_category');
    }

    public function all_artists()
    {
        $details=$this->Seller_model->display_seller_details();
        $this->data['seller']=$details;
        $this->render('all_seller_view');
    }
    public function all_buyers()
    {
        $details=$this->Seller_model->display_buyer_details();
        $this->data['buyer']=$details;
        $this->render('all_buyer_view');
    }

    public function user_details($id)
    {
        $details=$this->Seller_model->display_user_details($id);
        $this->data['userData']=(object)$details;
        $this->render('user_details_view');
    }
    public function buyer_user_details($id)
    {
        $details=$this->Seller_model->display_buyer_user_details($id);
        $this->data['buyer_user']=$details;
        $this->render('buyer_user_details_view');
    }

    public function artist_detailed_data($id)
    {
        $individual_artist=$this->Seller_model->individual_artist_details($id);
        $this->data['artist']=$individual_artist;
        $individual_artist_gallery=$this->Seller_model->individual_artist_gallery($id);
        $this->data['gallery']=$individual_artist_gallery;
        $this->render('artist_detailed_view');
    }

    public function send_message($id)
    {
        $individual_artist=$this->Seller_model->individual_artist_details($id);
        $this->data['artist']=$individual_artist;
        $this->render('send_message_view');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject','subject','required');
        $this->form_validation->set_rules('message','message','required');
        // $this->form_validation->set_rules('file','file');
        if($this->form_validation->run()==FALSE) {
            $this->render('send_message_view');
        }
        else {
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            $file = $this->input->post('file');
            $data = array(
                'subject' => $subject,
                'message' => $message,
                'user_id' => $this->session->userdata['user_id'],
                'file' => $file,
                'artist_id'=>$id
            );
            if(isset($_FILE['file'])){
                $image=$this->upload_file();
                if(is_array ($image))
                {
                    $data['file'] = $image['file_name'];
                }
                else
                {
                    echo $image;
                }
            }
            else{
                $data['file']='';
            }
            $this->Seller_model->insert_messages($data);
            $this->render('send_message_view');
        }
    }

    public function upload_file($field='file')
    {
        $config['upload_path']          = './media/uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|zip';
        $config['encrypt_name']        = TRUE;


        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload($field))
        {
            $data = $this->upload->display_errors();

        }
        else
        {
            $data =$this->upload->data();
        }
        return $data;
    }

    public function view_message()
    {
        $userid=$this->session->userdata('user_id');
        $msg=$this->Seller_model->get_messeges($userid);
        $this->data['message']=$msg;
        $this->render('display_message_view');

    }

    public function update_status_accept()
    {

        $id=$this->input->post('msg_id');
        print_r($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amount', 'amount', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->render('display_message_view');
        }
        else {
            $amount = $this->input->post('amount');
            $data = array(
                'image_amount' => $amount,
            );
            $status = 1;
            $data['status'] = $status;
            $this->Seller_model->update_current_status($id,$data);
            redirect('site/view_message');
        }


    }

    public function update_status_decline($mid)
    {
        $status=0;
        $data['status']=$status;
        $this->Seller_model->update_current_status1($mid,$data);
        redirect('site/view_message');
    }

    public function profile()
    {
       $userid=$this->session->userdata['user_id'];
        $this->data['userid']=$userid;
        $buyer=$this->Seller_model->get_buyer_details($userid);
        $this->data['buyer']=$buyer;
        $this->render('buyer_profile_details_display');

    }

    public function edit_profile()
    {
        $id=$this->session->userdata('user_id');
        $user=$this->Seller_model->get_user_details($id);
        $this->data['users']=$user;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
        $this->form_validation->set_rules('user_name', 'user_name', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('district', 'confirm_password', 'required');
        $this->form_validation->set_rules('pin', 'pin', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->render("update_user_profile_view");
        } else {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $mobile_number = $this->input->post('mobile_number');
            $city = $this->input->post('city');
            $district = $this->input->post('district');
            $pin = $this->input->post('pin');
            $user_name = $this->input->post('user_name');
            $password = $this->input->post('password');

            $data = array(

                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'mobile_number' => $mobile_number,
                'city' => $city,
                'district' => $district,
                'pin' => $pin,
                'username' => $user_name,
                'password' => $password,
            );
            $this->Seller_model->edit_user_profile($id,$data);
            redirect('Site/edit_profile');

        }
    }

    public function change_password()
    {

        $id=$this->session->userdata('user_id');
        $user=$this->Seller_model->get_user_details($id);
        $this->data['users']=$user;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'user_name', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->render("change_password_view");
        } else {
            $user_name = $this->input->post('user_name');
            $password = $this->input->post('password');

            $data = array(
                'username' => $user_name,
                'password' => $password,
            );
            $this->Seller_model->change_password($id,$data);
            redirect('Site/change_password');
        }
    }

    public function delete_product($id)
    {
      $this->Seller_model->cart_product_delete($id);
      redirect('site/cart');
    }
    public function deactivate_user($type,$id)
    {
      $this->Seller_model->deactivate_user($id);
      redirect($type=='artist'?'site/all_artists':'site/all_buyers');
    }
    public function activate_user($type,$id)
    {
      $this->Seller_model->activate_user($id);
      redirect($type=='artist'?'site/all_artists':'site/all_buyers');
    }
    public function delete_artist($id)
    {
      $this->Seller_model->delete_user($id);
      redirect('site/all_artists');
    }
    public function delete_comment($product_id,$commentId)
    {
      $this->Seller_model->delete_comment($commentId);
      redirect('seller/product_details/'.$product_id);
    }
    public function delete_buyer($id)
    {
      $this->Seller_model->delete_user($id);
      redirect('site/all_buyers');
    }
}