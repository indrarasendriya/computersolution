<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerusakan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cekLogin();
    $this->load->model('Kerusakan_model', 'kerusakan');
    $this->load->library('form_validation');
  }

  // Halaman Kerusakan
  public function index()
  {
    $this->form_validation->set_rules(
      'nama',
      'Nama',
      'required',
      [
        'required' => 'Nama Kerusakan Wajib Diisi'
      ]
    );
    $this->form_validation->set_rules(
      'solusi',
      'solusi',
      'required',
      [
        'required' => 'Solusi Kerusakan Wajib Diisi'
      ]
    );
    $this->form_validation->set_rules(
      'probabilitas',
      'probabilitas',
      'required',
      [
        'required' => 'Bobot Kerusakan Wajib Diisi'
      ]
    );


    if ($this->form_validation->run() == FALSE) {

      //jika validasi gagal
      $data['judul'] = "Halaman Kerusakan";
      $data['tabel'] = "Data Kerusakan";

      $data['user'] = $this->db->get_where('tbl_user', [
        'username' => $this->session->userdata('username')
      ])->row_array();
      $data['tbl_kerusakan'] = $this->kerusakan->getAllKerusakan();
      $data['kode'] = $this->kerusakan->KodeKerusakan();
      $data['isi'] = 'Admin/Kerusakan/index';

      $this->load->view('templates/Admin_wrapper', $data);
    } else {
      $this->tambah();
    }
  }

  // Tambah Kerusakan
  public function tambah()
  {
    $kerusakan = $this->input->post('nama');
    $kode_kerusakan = $this->input->post('kode');
    $solusi = $this->input->post('solusi');
    $probabilitas = $this->input->post('probabilitas');
    $gambar = $_FILES['gambar']['name'];

    //check($data);
    if ($gambar) {
      $namafile = "Kerusakan_" . $kerusakan;
      $config['file_name'] = $namafile;
      $config['allowed_types'] = '*';
      $config['max_size']      = '4096';
      $config['upload_path'] = './assets/images/kerusakan/';
      $config['overwrite'] = true;

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        $gambar_kerusakan = $this->upload->data('file_name');
        $data = [
          'kode_kerusakan' => $kode_kerusakan,
          'nama_kerusakan' => $kerusakan,
          'solusi' => $solusi,
          'probabilitas_kerusakan' => $probabilitas,
          'gambar' => $gambar_kerusakan
        ];
        $this->kerusakan->tambahKerusakan($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert- alert-success   fade show" role="alert">
        <strong>Data Kerusakan Berhasil Ditambah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'); //data kerusakan berhasil ditambahkan
        redirect('kerusakan');
      } else {
        echo $this->upload->display_errors();
        echo '<a href="' . base_url('kerusakan') . '">Kembali</a>';
      }
    }
  }


  // Ubah Kerusakan
  public function ubahkerusakan()
  {
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    // cek jika ada gambar yang akan diupload
    $upload_image = $_FILES['gambar']['name'];
    if ($upload_image) {
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']      = '4096';
      $config['upload_path'] = './assets/images/kerusakan/';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        // $old_image = $data['tbl_kerusakan']['gambar'];
        // if ($old_image != 'user.png') {
        //   unlink(FCPATH . '/assets/images/kerusakan/' . $old_image);
        // }
        $new_image = $this->upload->data('file_name');
        // var_dump($new_image);
        // die;
        $this->db->set('gambar', $new_image);
        // } else {
        //   echo $this->upload->dispay_errors();
        // }
        $this->kerusakan->ubahkerusakan();
        $this->session->set_flashdata('pesan', '<div class="alert alert- alert-info   fade show" role="alert">
        <strong>Data Kerusakan Berhasil Diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>'); //buat pesan akun berhasil dibuat
        redirect('kerusakan');
      }
    } else {
      // jika tidak ada gambar
      $this->kerusakan->ubahkerusakan();
      $this->session->set_flashdata('pesan', '<div class="alert alert- alert-info   fade show" role="alert">
        <strong>Data Kerusakan Berhasil Diubah</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>'); //buat pesan akun berhasil dibuat
      redirect('kerusakan');
    }
  }

  // Hapus Kerusakan
  public function hapus($id)
  {
    $this->kerusakan->hapusKerusakan($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert- alert-danger   fade show" role="alert">
    <strong>Data Kerusakan Berhasil Dihapus</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'); //buat pesan akun berhasil dibuat
    redirect('kerusakan');
  }
}
