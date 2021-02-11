<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cekLogin();
    $this->load->model('Gejala_model', 'MG');
    $this->load->library('form_validation');
  }

  // Halaman Gejala
  public function index()
  {
    $this->form_validation->set_rules(
      'nama',
      'Nama',
      'required',
      [
        'required' => 'Gejala Kerusakan Wajib Diisi'
      ]
    );
    if ($this->form_validation->run() == FALSE) {

      // jika validasi gagal
      $data['judul'] = 'Halaman Gejala';
      $data['tabel'] = 'Data Gejala';

      $data['user'] = $this->db->get_where('tbl_user', [
        'username' => $this->session->userdata('username')
      ])->row_array();
      $data['gejala'] = $this->MG->getAllGejala();
      $data['kode'] = $this->MG->KodeGejala();
      $data['isi'] = 'Admin/Gejala/index';

      $this->load->view('templates/Admin_wrapper', $data);
    } else {
      $this->tambah();
    }
  }

  // Tambah Gejala
  public function tambah()
  {
    $gejala = $this->input->post('nama');
    $kode_gejala = $this->input->post('kode');
    $data = [
      'kode_gejala' => $kode_gejala,
      'nama_gejala' => $gejala
    ];
    // check($data);


    $this->MG->tambahGejala($data);
    $this->session->set_flashdata('pesan', '<div class="alert alert- alert-success   fade show" role="alert">
    <strong>Data berhasil ditambah</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'); //buat pesan akun berhasil dibuat
    redirect('gejala');
  }

  // Ubah Gejala
  public function ubah($id)
  {
    $id_gejala = $id;
    $gejala = $this->input->post('nama');
    $kode_gejala = $this->input->post('kode');
    $data = [
      'id_gejala' => $id_gejala,
      'kode_gejala' => $kode_gejala,
      'nama_gejala' => $gejala
    ];
    // check($data);

    $this->MG->ubahGejala($data);
    $this->session->set_flashdata('pesan', '<div class="alert alert- alert-info   fade show" role="alert">
    <strong>Data berhasil diubah</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
    redirect('gejala');
  }

  //Hapus Gejala
  public function hapus($id)
  {
    $this->MG->hapusGejala($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Data berhasil dihapus</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'); //buat pesan akun berhasil dibuat
    redirect('gejala');
  }
}
