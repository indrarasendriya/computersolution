<?php

class Aturan_model extends CI_model
{
  // Menampilkan seluruh isi tabel Pengetahuan
  public function getAllAturan()
  {
    // menampilkan seluruh data gejala yang ada di tabel gejala.
    // $queryRule = "SELECT `tbl_pengetahuan`.`id`,`tbl_kerusakan`.`kode_kerusakan`,`tbl_kerusakan`.`nama_kerusakan`,`tbl_gejala`.`kode_gejala`,`tbl_gejala`.`nama_gejala`,`tbl_pengetahuan`.`probabilitas`
    // FROM `tbl_kerusakan` JOIN `tbl_pengetahuan` 
    // ON `tbl_kerusakan`.`id_kerusakan` = `tbl_pengetahuan`.`id_kerusakan`
    // JOIN `tbl_gejala` 
    // ON `tbl_pengetahuan`.`id_gejala` = `tbl_gejala`.`id_gejala`
    //                     ";
    // return $this->db->query($queryRule)->result_array();

    //return $this->db->get('tbl_pengetahuan')->result_array();

    $this->db->select(
      'ta.id
      ,tk.id_kerusakan
      ,tk.kode_kerusakan
      ,tk.nama_kerusakan
      ,tg.id_gejala
      ,tg.kode_gejala
      ,tg.nama_gejala
      ,ta.nilai_kemunculan'
    );
    $this->db->from('tbl_aturan ta');
    $this->db->join(
      'tbl_kerusakan tk',
      'ta.id_kerusakan = tk.id_kerusakan',
      'left'
    );
    $this->db->join(
      'tbl_gejala tg',
      'ta.id_gejala = tg.id_gejala',
      'left'
    );

    return $this->db->get()->result_array();
  }

  // Menampilkan seluruh isi tabel Gejala
  public function getAllGejala()
  {
    // menampilkan seluruh data gejala yang ada di tabel gejala.
    return $this->db->get('tbl_gejala')->result_array();
  }

  // Menampilkan seluruh isi tabel Kerusakan
  public function getAllKerusakan()
  {
    // menampilkan seluruh data kerusakan yang ada di tabel kerusakan.
    return $this->db->get('tbl_kerusakan')->result_array();
  }

  // CRUD Aturan
  // Tambah Data Aturan
  public function tambahAturan()
  {
    $data = [
      "id_kerusakan" => $this->input->post('kerusakan', true),
      "id_gejala" => $this->input->post('gejala'),
      "nilai_kemunculan" => $this->input->post('bobot')
    ];
    $this->db->insert('tbl_aturan', $data);
  }

  // Ubah Data Pengetahuan
  public function ubahAturan($id)
  {
    $id_aturan = $id;
    $data = [
      "id_kerusakan" => $this->input->post('kerusakan'),
      "id_gejala" => $this->input->post('gejala'),
      "nilai_kemunculan" => $this->input->post('bobot')
    ];
    $this->db->where('id', $id_aturan);
    $this->db->update('tbl_aturan', $data);
  }
  // Hapus Data Aturan
  public function hapus($id)
  {
    $this->db->delete('tbl_aturan', ['id' => $id]);
  }
  // END CRUD PENGETAHUAN
}
