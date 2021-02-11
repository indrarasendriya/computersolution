<?php

class Gejala_model extends CI_model
{
  // Membuat kode gejala menjadi AI (Auto Increment)
  public function KodeGejala()
  {
    $query = $this->db->query("select max(kode_gejala) as max_id from tbl_gejala");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "G";
    $kode = $char . sprintf("%02s", $noUrut);
    return $kode;
  }
  // CRUD GEJALA
  // menampilkan seluruh data gejala yang ada di tabel gejala.
  public function getAllGejala()
  {
    return $this->db->get('tbl_gejala')->result_array();
  }

  // Tambah data Gejala
  public function tambahGejala($data)
  {
    $this->db->insert('tbl_gejala', $data);
  }

  // Ubah Data Gejala
  public function ubahGejala($data)
  {
    $this->db->where('id_gejala', $data['id_gejala']);
    $this->db->update('tbl_gejala', $data);
  }

  // Menghapus Data Gejala
  public function hapusGejala($id)
  {
    // Hapus gejala berdasarkan id yang dipilih.
    $this->db->delete('tbl_gejala', ['id_gejala' => $id]);
  }
  // End CRUD GEJALA
}
