<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Diagnosa_model', 'DM');
    $this->load->model('Laporan_model', 'ML');
    $this->load->model('Gejala_model', 'GM');
    $this->load->library('form_validation');
  }


  public function hasil()
  {
    $this->DM->kosongTmpGejala();
    $this->DM->kosongTmpFinal();
    $this->DM->insertTmpGejala();

    $tmpGejala = $this->DM->insertTmpFinal();

    $tmpFinal =  $this->db->insert_batch('tmp_final', $tmpGejala);
    // check($tmpFinal);
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
    // $probK6 = $this->DM->ProbK6();
    // echo 'Nilai Prob K6 =' . $probK6 . '<br>';
    // $probK7 = $this->DM->ProbK7();
    // echo 'Nilai Prob K7 =' . $probK7 . '<br>';
    // $probK8 = $this->DM->ProbK8();
    // echo 'Nilai Prob K8 =' . $probK8 . '<br>';
    // $probK9 = $this->DM->ProbK9();
    // echo 'Nilai Prob K9 =' . $probK9 . '<br>';
    // $probK10 = $this->DM->ProbK10();
    // echo 'Nilai Prob K10 =' . $probK10 . '<br><br>';

    // Testing Hasil Perhitungan Bayes Tiap Kerusakan
    $data = [
      'K1' => $probK1,
      'K2' => $probK2,
      'K3' => $probK3,
      'K4' => $probK4,
      'K5' => $probK5,
      // 'K6' => $probK6,
      // 'K7' => $probK7,
      // 'K8' => $probK8,
      // 'K9' => $probK9,
      // 'K10' => $probK10
    ];
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
    // $K6 = ($probK6 / $jmlProb) . '<br>';
    // echo 'Nilai Perhitungan Bayes K6 =' . $K6 . '<br>';
    // $K7 = ($probK7 / $jmlProb) . '<br>';
    // echo 'Nilai Perhitungan Bayes K7 =' . $K7 . '<br>';
    // $K8 = ($probK8 / $jmlProb) . '<br>';
    // echo 'Nilai Perhitungan Bayes K8 =' . $K8 . '<br>';
    // $K9 = ($probK9 / $jmlProb) . '<br>';
    // echo 'Nilai Perhitungan Bayes K9 =' . $K9 . '<br>';
    // $K10 = ($probK10 / $jmlProb) . '<br>';
    // echo 'Nilai Perhitungan Bayes K10 =' . $K10 . '<br>';



    $this->DM->hasilProbK1($K1);
    $this->DM->hasilProbK2($K2);
    $this->DM->hasilProbK3($K3);
    $this->DM->hasilProbK4($K4);
    $this->DM->hasilProbK5($K5);
    // $this->DM->hasilProbK5($K6);
    // $this->DM->hasilProbK5($K7);
    // $this->DM->hasilProbK5($K8);
    // $this->DM->hasilProbK5($K9);
    // $this->DM->hasilProbK5($K10);

    //insert hasil dari diagnosa
    $this->DM->insertHasil();
    redirect('member/hasil_diagnosa');
  }
}
