<?php
    class  User_model extends CI_Model{

        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function register($enc_password){
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'zipcode' => $this->input->post('zipcode')
            );

            return $this->db->insert('users', $data);
        }

        public function login($username, $password){
            $this->db->where('username', $username);
            $query = $this->db->get('users');
            $user = $query->row();
            if(password_verify($password, $user->password)){
                return $user->id;
            }else{
                false;
            }
        }

        public function user_exists($username){
            $this->db->where('username', $username);
            // If username count is not 0 then it aleady exists
            return $this->db->count_all_results('users') != 0;
        }

        public function email_exists($email){
            $this->db->where('email', $email);
            // If username count is not 0 then it aleady exists
            return $this->db->count_all_results('users') != 0;
        }
    }
?>