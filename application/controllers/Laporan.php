<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cekLogin();
    $this->load->model('Laporan_model', 'MP');
  }

  public function index()
  {
    $data['judul'] = "Halaman Laporan";
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    $data['tabel'] = 'Data Hasil Rekap Konsultasi';
    $data['laporan'] = $this->MP->getAllLaporan();
    $data['isi'] = 'Admin/Laporan/index';
    //check($data['aturan']);
    $this->load->view('templates/Admin_wrapper', $data);
  }
}
