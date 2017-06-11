<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller
{

    public function index()
    {
        $this->load->template($this->session, 'location-info/index');
    }
}
