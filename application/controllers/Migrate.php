<?php

class Migrate extends CI_Controller
{

    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        }

    }

    public function down(){
        $this->migration->version(20170508113026);
    }

}