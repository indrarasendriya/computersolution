<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aturan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cekLogin();
    $this->load->model('Aturan_model', 'MP');
    $this->load->library('form_validation');
  }

  // Halaman Pengetahuan/Aturan
  public function index()
  {
    $this->form_validation->set_rules(
      'kerusakan',
      'kerusakan',
      'required',
      [
        'required' => 'Kerusakan Wajib Dipilih'
      ]
    );
    $this->form_validation->set_rules('gejala', 'gejala', 'required');
    $this->form_validation->set_rules('bobot', 'bobot', 'required');

    if ($this->form_validation->run() ==  FALSE) {

      $data['judul'] = "Halaman Aturan Kerusakan";
      $data['user'] = $this->db->get_where('tbl_user', [
        'username' => $this->session->userdata('username')
      ])->row_array();
      $data['tabel'] = 'Data Aturan Kerusakan';

      $data['gejala'] = $this->MP->getAllGejala();
      $data['kerusakan'] = $this->MP->getAllKerusakan();
      $data['aturan'] = $this->MP->getAllAturan();
      $data['isi'] = 'Admin/Aturan/index';
      //check($data['aturan']);
      $this->load->view('templates/Admin_wrapper', $data);
    } else {
      $this->tambah();
    }
  }

  // Tambah Aturan
  public function tambah()
  {
    $data['judul'] = 'Halaman Aturan Kerusakan';
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    $this->MP->tambahAturan();
    $this->session->set_flashdata('pesan', '<div class="alert alert- alert-success   fade show" role="alert">
    <strong>Data Aturan Berhasil Ditambah</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'); //buat pesan akun berhasil dibuat
    redirect('aturan');
  }

  // Ubah Pengetahuan/Aturan
  public function ubah($id)
  {
    $this->MP->ubahAturan($id);
    //buat pesan Pengetahuan berhasil dibuat
    $this->session->set_flashdata('pesan', '<div class="alert alert- alert-success   fade show" role="alert">
    <strong>Data Kerusakan Berhasil Diubah</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
    redirect('aturan');
  }

  // Hapus Pengetahuan/Aturan
  public function hapus($id)
  {
    $this->MP->hapus($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Aturan Berhasil Dihapus!</div>'); //buat pesan akun berhasil dibuat
    redirect('aturan');
  }
}
