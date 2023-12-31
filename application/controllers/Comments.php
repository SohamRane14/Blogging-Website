<?php
    class Comments extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model(['post_model', 'comment_model']);
        }

        public function create($post_id){
            $slug = $this->input->post('slug');
            
            $data['post'] = $this->post_model->get_posts($slug);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            // $this->form_validation->set_rules('name', 'Name', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/view', $data);
                $this->load->view('templates/footer');
            }else{
                $this->comment_model->create_comment($post_id);
                redirect('posts/'. $slug);
            }

        }
    }


?>