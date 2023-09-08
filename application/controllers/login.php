<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('login/login_view.php');
    }

	public function login_admin()
	{
        $current_user_id = null;
        $current_user_name = null;

        $username = $this->input->post('login_username');
        $password = $this->input->post('login_password');
        $remember_me = $this->input->post('login_remember_me');

        $md5_password = md5($password);

        $IS_VALID = $this->login_model->MOD_LOGIN_USER($username, $md5_password);

        if ($IS_VALID)
        {
            foreach ($IS_VALID as $IS_VALID_ROW)
            {
                $current_user_id = $IS_VALID_ROW->id;
                $current_user_name = $IS_VALID_ROW->name;
                $current_user_type = $IS_VALID_ROW->user_type;
            }

            if ($remember_me)
            {
                $this->session->set_userdata('login_username', $username);
                $this->session->set_userdata('login_password', $password);

                $this->session->set_userdata('remember_me', $remember_me);
            }

            else
            {
                $this->session->unset_userdata('login_username');
                $this->session->unset_userdata('login_password');

                $this->session->unset_userdata('remember_me');
            }

            $this->session->set_userdata('current_user_id', $current_user_id);
            $this->session->set_userdata('current_user_type', $current_user_type);
            $this->session->set_userdata('login_success', "Welcome, ".$current_user_name."!");

            if ($this->session->userdata('current_url'))
            {
                redirect($this->session->userdata('current_url'));
            }
            
            else
            {
                redirect(base_url()."main");
            }
        }

        else
        {
            $this->session->set_userdata('login_error', 'Invalid Username or Password');

            redirect(base_url());
        }
	}

    public function logout_admin()
    {
        $this->session->unset_userdata('current_url');
        $this->session->unset_userdata('current_user_id');
        
        $this->session->set_userdata('login_error', 'You have been logged out');

        redirect(base_url());
    }
    
    public function re_login_admin()
    {
        $this->session->unset_userdata('current_url');
        $this->session->unset_userdata('current_user_id');
        
        $this->session->set_userdata('login_error', 'You need to re-login');

        redirect(base_url());
    }
}
