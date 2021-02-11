<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model');
  }

  // Halaman Auth
  public function index()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['judul'] = "Halaman Login";
      $this->load->view('auth/login', $data);
    } else {
      $this->_login();
    }
  }


  // Validasi Login
  private function _login()
  {

    $username = $this->input->post('username');
    $pass = $this->input->post('password');

    $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

    // usernya ada
    if ($user) {
      // cek password
      if (password_verify($pass, $user['password'])) {
        $data = [
          'username' => $user['username'],
          'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if ($user['role_id'] == 1) {
          redirect('Admin');
        } else {
          redirect('Member/diagnosa');
        }
        // $data = [
        //   'nama_admin' => $user['nama_admin']
        // ];
        // $this->session->set_userdata($data);
        // redirect('admin');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Passwordnya salah!</div>'); //buat pesan akun tidak ada
        redirect('auth');
      }
    } else {
      // usernya ga ada
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User belum ada,silahkan buat akun dulu!</div>'); //buat pesan akun tidak ada
      redirect('auth');
    }
  }

  // Registrasi
  public function registrasi()
  {
    // Aturan Form_validation
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password2]', [ //min_length=minimal karakter
      'min_length' => 'Password minimal 4 karakter',
      'matches' => 'Password tidak sesuai'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');


    if ($this->form_validation->run() == false) {
      // Jika form validation tidak dapat dilewati/bernilai salah
      $data['judul'] = "Halaman Registrasi";
      $this->load->view('auth/registrasi', $data);
    } else {
      $this->Auth_model->registrasiAdmin(); //panggil fungsi registrasi yang ada di Auth_model
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil ditambahkan!,Silahkan login!</div>'); //buat pesan akun berhasil dibuat
      redirect('auth');
    }
  }

  // Logout
  public function logout()
  {
    $this->session->unset_userdata('username');

    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda telah Keluar!</div>'); //buat pesan akun berhasil dibuat
    redirect('auth');
  }

  public function forgotpassword()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required', [
      'required' => '%s harus diisi!!'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $data = [
        'title' => 'Form Lupa Password'
      ];
      $this->load->view('auth/form-reset-password', $data);
    } else {
      $username = $this->input->post('username');
      $user = $this->db->get_where('login', ['username' => $username])->row_array();

      if ($user) {
        // $data = $user['username'];
        $datausername = $user['username'];
        // var_dump($datausername);
        // die;
        $this->reset_password($datausername);
        // redirect('auth/reset_password');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan!</div>');
        redirect('auth/forgotpassword');
      }
    }
  }

  public function reset_password($datausername = NULL)
  {
    $this->form_validation->set_rules('password1', 'Password', 'trim|required', [
      'required' => '%s harus diisi!!'
    ]);
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password1]', [
      'matches' => 'Password tidak sama'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $data = [
        'title' => 'Form Reset Password',
        'datausername' => $datausername
      ];
      $this->load->view('auth/form-reset-password', $data);
    } else {
      $username = $this->input->post('username');
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $this->Auth_M->changespassword($password, $username);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil direset, silahkan login dengan password baru!</div>');
      redirect('auth');
    }
  }

  // Halaman Akses Ditolak/block
  public function blocked()
  {
    $data['judul'] = "Block Access";
    $this->load->view('auth/blocked', $data);
  }
}
