<?php 

    class Categories extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model(['post_model', 'category_model']);
        }

        public function index(){
            $data['title']  = 'Categories';
            $data['categories'] = $this->category_model->get_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index.php', $data);
            $this->load->view('templates/footer');
            
        }

        public function create(){
            if(! $this->session->userdata('logged_in')){
                redirect(('users/login'));
            }

            $data['title'] = 'Create Category';

            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->create_category();
                $this->session->set_flashdata('category_created', 'Your category has been created');
                redirect('categories');
            }
        }
        
        public function posts($id=NULL){
            if($id == NULL){
                show_404();
            }

            $data['title'] = $this->category_model->get_category($id)->name;
            $data['posts'] = $this->post_model->get_posts_by_category($id);
        
            $this->load->helper('text');
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');       
        }

        public function delete($id){
            if(! $this->session->userdata('logged_in')){
                redirect(('users/login'));
            }

            $this->category_model->delete_category($id);
            $this->session->set_flashdata('category_deleted', 'Your category has been deleted');
            redirect('categories');
        } 
    }