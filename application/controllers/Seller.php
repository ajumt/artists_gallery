<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Seller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->model('Seller_model');
        $this->load->model('productcategory_model');
        $this->load->model('Buyer_model');
    }

    public function product_details($id)
    {
        $res1 = $this->Seller_model->getAllsellers($id);
        $res3 = $this->Seller_model->getAllcomment($id);
        $this->data['users'] = $res1;
        $this->data['comment'] = $res3;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment', 'comment', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->render("product_details");
        } else {
            $this->add_comment($id);
        }
    }

    public function add_product()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name', 'product_name', 'required');
        $this->form_validation->set_rules('product_quantity', 'product_quantity', 'required');
        $this->form_validation->set_rules('product_price', 'product_price', 'required');
        $this->form_validation->set_rules('product_description', 'product_description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->render("seller_register");
        } else {
            $email = $this->input->post('email');
            $userid = $this->session->userdata('user_id');
            $type = $this->input->post('type');
            $product_name = $this->input->post('product_name');
            $product_quantity = $this->input->post('product_quantity');
            $product_price = $this->input->post('product_price');
            $product_description = $this->input->post('product_description');
            $product_property_name = $this->input->post('product_property_name');
            $product_property = $this->input->post('product_property');

            $data1 = array(
                'userid' => $userid,
                'product_name' => $product_name,
                'product_quantity' => $product_quantity,
                'product_price' => $product_price,
                'product_description' => $product_description,
            );
            $data2['product_property_name'] = $product_property_name;
            $data2['product_property'] = $product_property;

            $imgdata = $this->upload_product_image();

            if (is_array($imgdata)) {
                $data1['image'] = $imgdata['file_name'];
            } else {
                echo $imgdata;
            }
            $data = array(
                'email' => $email,
                'type' => $type,
            );
            $this->Seller_model->insertuserdata($data, $data1, $data2);
            redirect('seller', $data, $data1, $data2);
        }
    }

    public function add_comment($id)
    {
        $comment = $this->input->post('comment');
        $userid = $this->session->userdata('user_id');
        $created_on = date('Y/d/m');

        $data = array(
            'product_id' => $id,
            'comment' => $comment,
            'userid' => $userid,
            'created_on' => $created_on,
        );


        $this->Seller_model->comment($data);
        redirect('seller/product_details/'. $id);

    }


    public function upload_product_image()
    {
        $config['upload_path'] = './media/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $data = $this->upload->display_errors();

        } else {
            $data = $this->upload->data();

        }
        return $data;

    }

    public function add_user()
    {

        $gender = array(
            '0' => '-Select Gender-',
            'Female' => 'Female',
            'Male' => 'Male'
        );
        $artists = array(
            '0' => '--Artists Category--',
            'Painting' => 'painting'
        );
        $this->data['gender'] = $gender;
        $this->data['artists'] = $artists;
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
        $this->form_validation->set_rules('user_name', 'user_name', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('district', 'confirm_password', 'required');
        $this->form_validation->set_rules('pin', 'pin', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->render("user_register");
        } else {
            $type = $this->input->post('check');
            if ($type) {
                $type = 'Artist';
            } else {
                $type = 'Buyer';
            }

            $category = $this->input->post('artist');
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
                'type' => $type,
            );
            $userimage = $this->upload_user_image();
            if (is_array($userimage)) {
                $data['image'] = $userimage['file_name'];
            } else {
                $data['image'] = 'fem2.jpg';
            }
            $this->Seller_model->userreg($data);
            if ($type == 'Artists') {
                redirect('seller', $data);
            } else {
                redirect('site');
            }
        }
    }


    public function upload_user_image()
    {
        $config['upload_path'] = './media/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $data = $this->upload->display_errors();

        } else {
            $data = $this->upload->data();

        }
        return $data;

    }


    public function  logout()
    {

        $this->session->sess_destroy();
        redirect('Main');
    }

    public function  update($id)
    {
        $res1 = $this->Seller_model->update_user1($id);
        $this->data['users'] = $res1;

        $this->render('edit_seller_view');
    }

    public function edit_product($id)
    {

        $res1 = $this->Seller_model->update_user1($id);
        $this->data['users'] = $res1;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name', 'product_name', 'required');
        $this->form_validation->set_rules('product_quantity', 'product_quantity', 'required');
        $this->form_validation->set_rules('product_price', 'product_price', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->render('edit_seller_view');
        } else {
            $product_name = $this->input->post('product_name');
            $product_quantity = $this->input->post('product_quantity');
            $product_price = $this->input->post('product_price');
            $id = $this->input->post('num');


            $data = array('id' => $id,
                'product_name' => $product_name,
                'product_quantity' => $product_quantity,
                'product_price' => $product_price,
            );


            $imgdata = $this->upload_product_image1();

            if (is_array($imgdata)) {
                $data['image'] = $imgdata['file_name'];
            } else {
                echo $imgdata;
            }
            $this->Seller_model->updateuserdata1($data, $id);
            redirect('seller/index', $data);
        }
    }

    public function upload_product_image1()
    {
        $config['upload_path'] = './media/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $data = $this->upload->display_errors();

        } else {
            $data = $this->upload->data();

        }
        return $data;

    }

    public function delete_product($id)
    {
        $this->Seller_model->row_delete($id);
        redirect('seller/index');

    }

    public function comment_details($name)
    {
        $res3 = $this->Seller_model->getAllcomment($name);
        $this->data['com'] = $res3;

        $this->render("product_details");

    }

    public function cart_product($id)
    {
        $res1 = $this->Seller_model->getAllsellers($id);
        $this->data['product'] = $res1;
        $this->render('cart_product_view');
    }

    public function change_status($order_id, $status)
    {
        $data['status'] = $status;
        if ($status == 1) {
            $data['ship_date'] = date('Y-m-d H:i:s');
        } else {
            $data['ship_date'] = null;
        }
        $this->Seller_model->change_status($order_id, $data);
        echo json_encode(['status' => true]);
    }
    public function place_order()
    {
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
            $this->Seller_model->insert_image_details($artist_id,$data2);

            redirect('Seller/view_message');
        }

    }

    public function add_qty($qty,$product_id)
    {
        $userid=$this->session->userdata('user_id');
        $data['product_qty']=$qty;
        $this->Seller_model->updaye_qty($data,$product_id,$userid);
    }

    public function buyer_product_view($id)
    {
        $product=$this->Buyer_model->get_buyer_product($id);
        $this->data['products']=$product;
        $this->render('buyer_product_view');
    }

    public function update_current_status()
    {
        $userid =$this->input->post('buyer_id');
        $status='shiped';
        $data['type']=$status;
        $this->Buyer_model->update_buyer_current_status($userid,$data);
        redirect('Seller/myorder');
    }

    public function delete_message($mid)
    {
        $this->Seller_model->delete_message($mid);
        redirect('Seller/view_message');
    }

    public function set_bid($pid)
    {
        $uid=$this->session->userdata('user_id');
        $product=$this->Seller_model->get_All_product($pid,$uid);
        $this->data['product']=$product;
        $this->render('set_bid_view');
    }

    public function bids()
    {
        $this->render('bids_view');
    }


      public function completed_bid()
      {
          $bid=$this->Seller_model->get_Allcompletedbid_details();
          $this->data['bids']=$bid;
          $this->render('active_bid_details_view');
      }

    public function active_biddings()
    {
       $a_bid=$this->Seller_model->get_Allcompletedbid_details();
        $this->data['active_bid']=$a_bid;
        $this->render('active_bid_details_view');
    }

}