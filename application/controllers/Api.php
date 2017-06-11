<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function index()
    {
        $this->session->logined = false;
        $this->load->template($this->session->logined, $this->session->logined ? 'index/logined_index_page' : 'index/not_logined_index_page');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password =  $this->input->post('password');
        $this->load->model('user_model');
        $result = $this->user_model->login($username, $password);
        if(count($result) == 0){

        }else{
            $this->session->logined=true;
            $this->session->set_userdata($result[0]);
        }
        redirect('');
    }
    public function register()
    {
        $username = $this->input->post('username');
        $password =  $this->input->post('password');
        $this->load->model('user_model');
        $this->user_model->register($username, $password);
        $result = $this->user_model->login($username, $password);
        $this->session->logined=true;
        $this->session->set_userdata($result[0]);
        redirect('');
    }
    public function logout()
    {
        session_destroy();
        redirect('');
    }
}
