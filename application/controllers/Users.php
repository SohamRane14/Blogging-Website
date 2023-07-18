<?php 

class Users extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function register(){
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_not_used');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required|callback_email_not_used');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
    
        if($this->form_validation->run() === FALSE) {
           $this->load->view('templates/header');
           $this->load->view('users/register', $data);
           $this->load->view('templates/footer'); 
        }else{
            $input_password = $this->input->post('password');
            $enc_password = password_hash($input_password, PASSWORD_BCRYPT);

            $this->user_model->register($enc_password);
            $this->session->set_flashdata('user_registered', 'Now you are register and can login');
         
            redirect('posts');
        }
    }

    public function login(){
        $data['title'] = 'Log In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if($this->form_validation->run() === FALSE) {
           $this->load->view('templates/header');
           $this->load->view('users/login', $data);
           $this->load->view('templates/footer'); 
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_id = $this->user_model->login($username, $password);
            if($user_id){
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('user_logged_in', 'You are now logged in');
                redirect('posts');
            }else{
                $this->session->set_flashdata('login_fail', 'Login Failed');
                redirect('users/login');
            }       
            
        }
    }

    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('user_logged_out', 'You are now logged out');
        redirect('users/login');  
    }

    public function username_not_used($username) {
        $this->form_validation->set_message('username_not_used', 'That username is taken. Please choose a different one');
        // validation fail if username already exists
        return ! $this->user_model->user_exists($username);
    }

    public function email_not_used($email) {
        $this->form_validation->set_message('email_not_used', 'That email is taken. Please choose a different one');
        // validation fail if email already exists
        return ! $this->user_model->email_exists($email);
    }
}