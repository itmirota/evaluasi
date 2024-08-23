<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * @author : Tri Cahya Wibawa
 * @version : 1.0
 * @since : 11 Februari 2024
 */

class evaluasiKerja extends BaseController
{

  public function __construct()
  {
      parent::__construct();
      $this->load->model('evaluasiKerja_model');
      $this->load->model('crud_model');
  }

  public function index(){
    $this->global['pageTitle'] = 'Evaluasi Kerja Mirota KSM';
    $this->global['pageHeader'] = 'Formulir Evaluasi Kerja';

    $check = $this->uri->segment(1);
    
    if ($check != 'penilaianEvaluasi'){
      $data['list_data']= $this->evaluasiKerja_model->getData();
    }else{
      $data['list_data']= $this->evaluasiKerja_model->getDataEvaluasibyDate();
    };
    
    $data['check']= $this->uri->segment(1);

    $this->loadViews("evaluasiKerja/data", $this->global, $data, NULL);
  }

  public function jadwalEvaluasiKerja(){
    $this->global['pageTitle'] = 'Evaluasi Kerja Mirota KSM';
    $this->global['pageHeader'] = 'Formulir Evaluasi Kerja';

    $this->loadViews("evaluasiKerja/formulir", $this->global, NULL);
  }

  public function saveJadwalPenilaian(){
    $tgl_evaluasi = $this->input->post('tgl_evaluasi');
    $nama_peserta = $this->input->post('nama_peserta');
    $bagian = $this->input->post('bagian');
    $tgl_akhir_kontrak = $this->input->post('tgl_akhir_kontrak');


    $data = array(
      'tgl_evaluasi' => $tgl_evaluasi,
      'nama_peserta' => $nama_peserta,
      'bagian' => $bagian,
      'tgl_akhir_kontrak' => $tgl_akhir_kontrak,
    );

    $query = $this->crud_model->input($data, 'tbl_evaluasikerja');

    $this->set_notifikasi_swal('success','Berhasil','Data Berhasil Disimpan');
    redirect('EvaluasiKerja');
  }

  public function hasilEvaluasi(){
    $this->global['pageTitle'] = 'Evaluasi Kerja Mirota KSM';
    $this->global['pageHeader'] = 'Formulir Evaluasi Kerja';

    $id = $this->uri->segment(2);
    
    $data['list_data']= $this->evaluasiKerja_model->getDataEvaluasi($id);
    $data['hasil']= $this->evaluasiKerja_model->getDataHasil($id);
    $data['total']= $this->evaluasiKerja_model->getSumHasil($id);

    $this->loadViews("evaluasiKerja/laporan", $this->global, $data, NULL);
  }

  public function penilaian(){
    $this->global['pageTitle'] = 'Evaluasi Kerja Mirota KSM';
    $this->global['pageHeader'] = 'Formulir Penilaian';
    $id = $this->uri->segment(2);

    $data['list_data']= $this->evaluasiKerja_model->getDataEvaluasi($id);
    $data['id']= $id;

    $this->loadViews("evaluasiKerja/penilaian", $this->global, $data, NULL);
  }

  public function savePenilaian(){
    $evaluasiKerja_id = $this->input->post('evaluasiKerja_id');
    $nama_penilai = $this->input->post('nama_penilai');
    $jabatan_bagian = $this->input->post('jabatan_bagian');
    $parameter1 = $this->input->post('parameter1');
    $parameter2 = $this->input->post('parameter2');
    $parameter3 = $this->input->post('parameter3');
    $parameter4 = $this->input->post('parameter4');
    $parameter5 = $this->input->post('parameter5');
    $parameter6 = $this->input->post('parameter6');
    $kelebihan = $this->input->post('kelebihan');
    $kekurangan = $this->input->post('kekurangan');
    $rekomendasi = $this->input->post('rekomendasi');



    $data = array(
      'evaluasiKerja_id' => $evaluasiKerja_id,
      'nama_penilai' => $nama_penilai,
      'jabatan_bagian' => $jabatan_bagian,
      'parameter1' => $parameter1,
      'parameter2' => $parameter2,
      'parameter3' => $parameter3,
      'parameter4' => $parameter4,
      'parameter5' => $parameter5,
      'parameter6' => $parameter6,
      'kelebihan' => $kelebihan,
      'kekurangan' => $kekurangan,
      'rekomendasi' => $rekomendasi

    );

    $query = $this->crud_model->input($data, 'tbl_penilaian');

    $this->set_notifikasi_swal('success','Berhasil','Data Berhasil Disimpan');
    redirect('penilaianEvaluasi');
  }

}