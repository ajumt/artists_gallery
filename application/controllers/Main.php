<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->model('login_model','login');
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		if(isset($_GET['error'])){
			$this->data['message']='Your account is temporarily deactivated by admin, please contact admin';
		}
		else
		$this->data['message']='';
		$this->load->helper('security');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username:', 'required|trim');
		$this->form_validation->set_rules('password', 'Password:', 'required|trim');

		if ($this->form_validation->run()===FALSE)
		{
			$this->render('user_login');

		}
		else {
			$user = $this->login->login($this->input->post('username'),$this->input->post('password'));
			print_r($user);
			if($user) {
				if($user->active==1){
					$data = array(
						'username' => $user->username,
						'user_id' => $user->id,
						'type' => $user->type,
						'image' => $user->image,
						'currently_logged_in' => 1
					);
					$this->session->set_userdata($data);
					print_r($this->session->userdata());
					redirect('site/index');
				}
				else{
					$this->session->set_flashdata('message','Your account is temporarily deactivated');
					redirect('main/login?error=401');
				}
			}
			else{
				redirect('main');
			}
		}
	}

	public function signin()
	{
		$this->load->view('signin');
	}

	public function invalid()
	{
		$this->load->view('invalid');
	}
	public function get_courses()
	{
		$data['course'] = $this->login_model->get_courses();
		$this->load->view('country_list_view', $data);
	}


	public function signin_validation()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|is_unique[signup.username]');

		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		$this->form_validation->set_message('is_unique', 'username already exists');

		if ($this->form_validation->run())
		{
			echo "Welcome, you are logged in.";
		}
		else {

			$this->load->view('signin');
		}
	}

	public function validation()
	{
		$this->load->model('login_model');
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		if ($this->login_model->login($username,$password))
		{
			return true;
		} else
		{
			$this->form_validation->set_message('validation', 'Incorrect username/password.');
			return false;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Main/login');
//		redirect('site/index');
	}
	public function user_logout()
	{
		$this->session->sess_destroy();
		redirect('site/index');
	}
}
?>