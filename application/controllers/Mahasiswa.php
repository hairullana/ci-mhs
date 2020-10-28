<?php

class Mahasiswa extends CI_Controller {

    // construct untuk memanggil database ke semua method di controller ini
    // jika tidak bisa atur di application/config/autoload
    // public function __construct(){
    //     parent:: __construct();
    //     $this->load->database();
    // }

    // construct = selalu ada di controller ini
    public function __construct(){
        // wajib isi ini, gatau kenapa
        parent::__construct();
        // men-load model
        $this->load->model('Mahasiswa_model');
        // mengaktifkan form validation CI untuk controller mahasiswa saja
        $this->load->library('form_validation');
    }

    // index untuk controller ini
    public function index(){
        // set judul
        $data['judul'] = 'Data Mahasiswa';
        // mengambil semua data mahasiswa
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        // jika user searching
        if ( $this->input->post('keyword') ) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    // method tambah data
    public function tambah(){
        //set judul
        $data['judul'] = 'Form Tambah Data Mahasiswa';
        // array untuk jurusan
        $data['jurusan'] = ['Matematika', 'Kimia', 'Fisika', 'Biologi', 'Informatika', 'Biologi'];

        // validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        // jika ada yg salah, tampilakan form lagi
        if ( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        }else {     // jika benar
            // jalankan method mahasiswa
            $this->Mahasiswa_model->tambahDataMahasiswa();
            // flashdata
            $this->session->set_flashdata('flash', 'Ditambahkan');
            // echo $this->session->flashdata('flash');
            // kembali ke halaman mahasiswa
            redirect('mahasiswa');
        }
    }

    // method hapus data
    public function hapus($id){
        // jalankan method di model
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        // set flashdata
        $this->session->set_flashdata('flash', 'Dihapus');
        // direct ke mahasiswa
        redirect('mahasiswa');
    }

    // method untuk melihat detil data mahasiswa
    public function detail($id){
        // set judul halaman
        $data['judul'] = "Detail Data Mahasiswa";
        // ambil data mahasiswa di dalam model
        $data['mahasiswa'] = $this->Mahasiswa_model->detailDataMahasiswa($id);
        // views
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }

    // method untuk ubah data mhs
    public function ubah($id){
        //set judul
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        // ambil data mhs
        $data['mahasiswa'] = $this->Mahasiswa_model->detailDataMahasiswa($id);
        // array untuk jurusan
        $data['jurusan'] = ['Matematika', 'Kimia', 'Fisika', 'Biologi', 'Informatika', 'Biologi'];

        // validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        // jika ada yg salah, tampilakan form lagi
        if ( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('templates/footer');
        }else {     // jika benar
            // jalankan method mahasiswa
            $this->Mahasiswa_model->ubahDataMahasiswa($id);
            // flashdata
            $this->session->set_flashdata('flash', 'Diubah');
            // echo $this->session->flashdata('flash');
            // kembali ke halaman mahasiswa
            redirect('mahasiswa');
        }
    }
}