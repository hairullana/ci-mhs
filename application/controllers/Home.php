<?php

class Home extends CI_Controller {

    // fungsi berisi parameter memiliki default value 'User'
    public function index($nama = 'User'){
        // memasukkan ke array
        $data['nama'] = $nama;
        $data['judul'] = "Welcome";
        // kirim ke templates/header.php
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

}