<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rest_server  {
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('rest_server');
       
        $this->load->view("HomePage");
    

    }
}
