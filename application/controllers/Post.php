<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('reply_model');
        $this->load->library('user_agent');
    }

    public function index()
    {
        $this->load->template($this->session, 'post/index');
    }

    public function watch($postId)
    {
        $data['post'] = $this->post_model->getPost($postId);
        $data['reply'] = $this->reply_model->getReplyByPost($postId);
        $this->load->template($this->session, 'post/index', $data);
    }

    public function reply($postId)
    {
        $this->reply_model->newReply($this->input->post('content'), $postId, $this->session->id);
        if ($this->agent->is_referral()) {
            redirect($this->agent->referrer());
        }
    }

    public function add()
    {
        $post_img_url = $this->uploadImage($_FILES['image']);
        if($post_img_url){
            $insertID = $this->post_model->addPost($this->session->id, $post_img_url,  $_POST['lat'], $_POST['lng'],$_POST['location_name'], $_POST['movie_id'], $_POST['title'], $_POST['content'] );
        }else{
            $insertID = $this->post_model->addPost($this->session->id, null,  $_POST['lat'], $_POST['lng'],$_POST['location_name'], $_POST['movie_id'], $_POST['title'], $_POST['content'] );
        }
        redirect('/post/watch/'.$insertID);
    }
    private function uploadImage($img){
        $client_id = "076df707c112c30";
        if ($img['name'] == '') {
           return false;
        } else {
            $filename = $img['tmp_name'];
            $handle = fopen($filename, "r");
            $data = fread($handle, filesize($filename));
            $pvars = array('image' => base64_encode($data));
            $timeout = 30;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,
                'https://api.imgur.com/3/image.json');
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array('Authorization: Client-ID ' . $client_id));
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $out = curl_exec($curl);
            curl_close($curl);
            $pms = json_decode($out, true);
            $url = $pms['data']['link'];
            if ($url != "") {
                return $url;
            } else {
               return false;
            }
        }
    }
}
