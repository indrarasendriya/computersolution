<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Member_model', 'MM');
    $this->load->model('Diagnosa_model', 'DM');
    $this->load->model('Gejala_model', 'GM');
    $this->load->model('Kerusakan_model', 'KM');
    $this->load->model('Laporan_model', 'ML');
    $this->load->library('form_validation');
  }
  public function index()
  {
    $data['judul'] = "Halaman Member";
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    $data['isi'] = 'Member/index';

    $this->load->view('templates/Member_wrapper', $data);
  }




  public function diagnosa()
  {
    $this->form_validation->set_rules(
      'id_gejala[]',
      'gejala',
      'required',
      [
        'required' => '<center>Silahkan pilih gejala kerusakan komputer yang disediakan</center>'
      ]
    );

    if ($this->form_validation->run() == FALSE) {

      $data['judul'] = "Daftar Gejala";
      $data['user'] = $this->db->get_where('tbl_user', [
        'username' => $this->session->userdata('username')
      ])->row_array();
      $data['gejala'] = $this->GM->getAllGejala();
      $data['isi'] = 'Member/index';

      $this->load->view('templates/Member_wrapper', $data);
    } else {
      $this->hasil();
    }
  }

  public function hasil()
  {
    $this->DM->kosongTmpGejala();
    $this->DM->kosongTmpFinal();

    $gejala = $this->input->post('id_gejala');
    $jml_gejala = count($gejala);

    // validasi jumlah inputan gejala

    if ($jml_gejala > 5) {
      $this->session->set_flashdata('pesan', '<div class="alert alert- alert-danger fade show" style="text-align: center;" role="alert">
    <strong>Silahkan untuk memilih maksimal 5 gejala kerusakan komputer yang dialami.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'); //buat pesan akun berhasil dibuat
      redirect('Member/diagnosa');
    } else {
      $this->DM->insertTmpGejala($gejala);
    }

    $tmpGejala = $this->DM->insertTmpFinal();

    // check($tmpGejala);
    $tmpFinal =  $this->db->insert_batch('tmp_final', $tmpGejala);
    // Proses Perhitungan
    $probK1 = $this->DM->ProbK1();
    echo 'Nilai Prob K1 =' . $probK1 . '<br>';
    $probK2 = $this->DM->ProbK2();
    echo 'Nilai Prob K2 =' . $probK2 . '<br>';
    $probK3 = $this->DM->ProbK3();
    echo 'Nilai Prob K3 =' . $probK3 . '<br>';
    $probK4 = $this->DM->ProbK4();
    echo 'Nilai Prob K4 =' . $probK4 . '<br>';
    $probK5 = $this->DM->ProbK5();
    echo 'Nilai Prob K5 =' . $probK5 . '<br>';
    $probK6 = $this->DM->ProbK6();
    echo 'Nilai Prob K6 =' . $probK6 . '<br>';
    $probK7 = $this->DM->ProbK7();
    echo 'Nilai Prob K7 =' . $probK7 . '<br>';


    // Testing Hasil Perhitungan Bayes Tiap Kerusakan
    $data = [
      'K1' => $probK1,
      'K2' => $probK2,
      'K3' => $probK3,
      'K4' => $probK4,
      'K5' => $probK5,
      'K6' => $probK6,
      'K7' => $probK7,
    ];
    // check($data);
    //

    $jmlProb = array_sum($data);
    echo 'Jumlah Probabilitas =' . $jmlProb . '<br><br>';
    // check($jmlProb);
    $K1 = ($probK1 / $jmlProb) . '<br>';
    echo 'Nilai Perhitungan Bayes K1 =' .  $K1 . '<br>';
    $K2 = ($probK2 / $jmlProb) . '<br>';
    echo 'Nilai Perhitungan Bayes K2 =' . $K2 . '<br>';
    $K3 = ($probK3 / $jmlProb) . '<br>';
    echo 'Nilai Perhitungan Bayes K3 =' . $K3 . '<br>';
    $K4 = ($probK4 / $jmlProb) . '<br>';
    echo 'Nilai Perhitungan Bayes K4 =' . $K4 . '<br>';
    $K5 = ($probK5 / $jmlProb) . '<br>';
    echo 'Nilai Perhitungan Bayes K5 =' . $K5 . '<br>';
    $K6 = ($probK6 / $jmlProb) . '<br>';
    echo 'Nilai Perhitungan Bayes K6 =' . $K6 . '<br>';
    $K7 = ($probK7 / $jmlProb) . '<br>';
    echo 'Nilai Perhitungan Bayes K7 =' . $K7 . '<br>';



    $this->DM->hasilProbK1($K1);
    $this->DM->hasilProbK2($K2);
    $this->DM->hasilProbK3($K3);
    $this->DM->hasilProbK4($K4);
    $this->DM->hasilProbK5($K5);
    $this->DM->hasilProbK6($K6);
    $this->DM->hasilProbK7($K7);
    //check($data);

    //insert hasil dari diagnosa
    $this->DM->insertHasil();
    redirect('member/hasil_diagnosa');
  }

  public function hasil_diagnosa()
  {
    $data['judul'] = "Halaman Hasil Diagnosa";
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    // $data['tbl_kerusakan'] = $this->KM->getAllKerusakan();
    $data['isi'] = 'hasil/index';

    // Hasil Diagnosa Akhir
    // Hasil 3 Kerusakan dengan prob tertinggi
    $data['diagnosa'] =  $this->DM->diagnosa();
    // Hasil Kerusakan dengan prob paling tinggi
    $data['tertinggi'] = $this->DM->detailDiagnosa();
    //check($data);
    // Detail Hasil Diagnosa
    $data['detail'] = $this->DM->detailDiagnosa();

    $data['kerusakan'] = $this->db->get('tbl_kerusakan')->result_array();

    $this->load->view('templates/Member_wrapper', $data);
    //check($data);
  }
}
