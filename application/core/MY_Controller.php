<?php


class MY_Controller extends CI_Controller
{
    protected $data=array();
    public function __construct(){
        parent::__construct();
    }
    protected function render($page){
//        print_r($page);
        $this->data['sidebar_menu']=$this->set_site_menu();
        $this->load->view('_template/home/header.php',$this->data);
        $this->load->view('_template/home/sidebar.php',$this->data);
        $this->load->view($page,$this->data);
        $this->load->view('_template/home/footer.php',$this->data);
    }
    private function set_site_menu(){
        $menu=array();
        $public_menu = array(
            array('href'=>'site/index','text'=>'Home','img'=>'dashboard.png'),
            array('href'=>'site/shop','text'=>'Shop','img'=>'shop.png'),
            array('href'=>'site/cart','text'=>'Cart','img'=>'cart.png'),
            array('href'=>'site/signin','text'=>'Sign Up','img'=>'sign-up.png'),
            array('href'=>'main/login','text'=>'Login','img'=>'login.png'),
        );
        $admin_menu = array(
            array('href'=>'site/index','text'=>'Home','img'=>'dashboard.png'),
            array('href'=>'site/shop','text'=>'Shop','img'=>'shop.png'),
            array('href'=>'site/art_category','text'=>'Art Categorise','img'=>'categories.png'),
            array('href'=>'Productcategory/display_product_category','text'=>'Product Categorise','img'=>'categories.png'),
            array('href'=>'Productcategory/view_product','text'=>'Products','img'=>'product.png'),
            array('href'=>'Site/seller_view','text'=>'Artists','img'=>'artists.png'),
            array('href'=>'Site/buyer_view','text'=>'Buyers','img'=>'buyers.png'),
//            array('href'=>'site/signin','text'=>'Sign Up','img'=>'dashboard.png'),
            array('href'=>'main/logout','text'=>'Logout','img'=>'signout.png'),
        );
        $artist_menu = array(
            array('href'=>'site/index','text'=>'Home','img'=>'dashboard.png'),
            array('href'=>'site/shop','text'=>'Shop','img'=>'shop.png'),
//            array('href'=>'site/cart','text'=>'Cart','img'=>'dashboard.png'),
            array('href'=>'Artist/index','text'=>'My Gallery','img'=>'dashboard.png'),
            array('href'=>'Artist/my_product_view','text'=>'My Product','img'=>'dashboard.png'),
            array('href'=>'Artist/active_bid','text'=>'Bids','img'=>'dashboard.png'),
            array('href'=>'Artist/myorder','text'=>'My Order','img'=>'dashboard.png'),
            array('href'=>'Artist/Shipments','text'=>'Shipments','img'=>'dashboard.png'),
            array('href'=>'Artist/view_message','text'=>'View Messages','img'=>'dashboard.png'),
            array('href'=>'main/logout','text'=>'Logout','img'=>'dashboard.png'),
        );
        $buyer_menu = array(
            array('href'=>'site/index','text'=>'Home','img'=>'dashboard.png'),
            array('href'=>'site/shop','text'=>'Shop','img'=>'shop.png'),
            array('href'=>'site/cart','text'=>'Cart','img'=>'cart.png'),
//            array('href'=>'site/signin','text'=>'Sign Up','img'=>'dashboard.png'),
            array('href'=>'Buyer/myorder','text'=>'My Order','img'=>'orders.png'),
//            array('href'=>'Buyer/my_product_view','text'=>'My Gallery','img'=>'dashboard.png'),
            array('href'=>'Buyer/active_biddings','text'=>'Active Bidding','img'=>'orders.png'),
            array('href'=>'Buyer/artists_details','text'=>'Artists','img'=>'buyers.png'),
            array('href'=>'Buyer/view_message','text'=>'View Messages','img'=>'messages.png'),
            array('href'=>'main/logout','text'=>'Logout','img'=>'logout.png'),
        );
        $menu=array();
        $menu = $public_menu;
        if($this->session->userdata('currently_logged_in')) {
            if ($this->session->userdata('type') == 'Artist') {
                $menu = $artist_menu;
            }
            elseif ($this->session->userdata('type') == 'Buyer') {
                $menu = $buyer_menu;
            }
            else {
                $menu = $admin_menu;
            }
            $this->data['user'] = $this->session->userdata();
        }

        return $menu;
    }

}