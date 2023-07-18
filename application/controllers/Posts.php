<?php
    class Posts extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model(['post_model', 'comment_model']);
            $this->load->library(['form_validation']);

        }
        public function index($offset= 0){
            $this->load->helper('text');

            $config = array(
                'base_url' => base_url('posts/index'),
                'total_rows' => $this->db->count_all('posts'),
                'per_page' => 3,
                'url_segment' => 3,
                'attributes' => ['class' => 'btn btn-secondary p2 m-3'],
                'cur_tag_open' => '<strong class="btn">',
                'cur_tag_close' => '</strong>'
            );

            $this->pagination->initialize($config);

            $data['title'] = 'Latest Posts'; 
            $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
            
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL) {
            $data['post'] = $this->post_model->get_posts($slug);
            $post_id = $data['post']['id'];
            $data['comments'] = $this->comment_model->get_comments($post_id);
            
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            //Check if logged in

            if(! $this->session->userdata('logged_in')){
                redirect(('users/login'));
            }

            $data['title'] = 'Create post';
            $data['categories'] = $this->post_model->get_categories();
            
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            $this->form_validation->set_rules('category_id', 'Catergory', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->post_model->create_post(); 
                //Flash message
                $this->session->set_flashdata('post_created', 'Your post has been created');
                // redirect('posts');
                redirect('posts');
            }
            
        }

        public function delete($id){
            if(! $this->session->userdata('logged_in')){
                redirect(('users/login'));
            }

            $this->post_model->delete_post($id);
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
            redirect('posts');
        } 

        public function edit($slug){
            if(! $this->session->userdata('logged_in')){
                redirect(('users/login'));
            }

            $data['post'] = $this->post_model->get_posts($slug);
            
            //Check user
            if($this->session->userdata('user_id') != $data['post']['user_id']){
                redirect('posts');
            }

            $data['categories'] = $this->post_model->get_categories();
            $data['title'] = 'Edit Post';

            if(empty($data['post'])){
                show_404();
            }

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){
            if(! $this->session->userdata('logged_in')){
                redirect(('users/login'));
            }

            $this->post_model->update_post();
            $this->session->set_flashdata('post_updated', 'Your post has been updated');
            redirect('posts');
        }
}