<?php

// selalu extends CI_model
class Mahasiswa_model extends CI_model {

    public function getAllMahasiswa(){
        // menghasilkan data table mhs berupa array
        return $this->db->get('mhs') -> result_array();
    }

    // masukkan data ke DB
    public function tambahDataMahasiswa(){
        // masukkan inputan ke $data
        $data = [
            "nama" => $this->input->post("nama", true),
            "nim" => $this->input->post("nim", true),
            "email" => $this->input->post("email", true),
            "jurusan" => $this->input->post("jurusan", true)
        ];

        // insert db
        $this->db->insert('mhs', $data);
    }

    // method hapus data mahasiswa
    public function hapusDataMahasiswa($id){
        // alternatif 1
        $this->db->where('id', $id);
        $this->db->delete('mhs');

        // alternatif 2
        //$this->db->detele('mhs', ['id' => $id]);
    }

    // method detail data mahasiswa
    public function detailDataMahasiswa($id){
        return $this->db->get_where('mhs', ['id' => $id])->row_array();
    }

    public function ubahDataMahasiswa($id){
        // masukkan inputan ke $data
        $data = [
            "nama" => $this->input->post("nama", true),
            "nim" => $this->input->post("nim", true),
            "email" => $this->input->post("email", true),
            "jurusan" => $this->input->post("jurusan", true)
        ];

        // select db
        $this->db->where('id', $this->input->post('id'));
        // update db
        $this->db->update('mhs', $data);
    }

    public function cariDataMahasiswa(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mhs')->result_array();
    }

}