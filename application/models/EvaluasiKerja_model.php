<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class EvaluasiKerja_model extends CI_Model
{
    
  function getData(){
    $this->db->select('*, DATE(tgl_evaluasi) as date');
    $this->db->from('tbl_evaluasikerja');
    $query = $this->db->get();

    return $query->result();
  }

  function getDataEvaluasi($id){
    $this->db->select('*');
    $this->db->from('tbl_evaluasikerja');
    $this->db->where('id_evaluasiKerja', $id);
    $query = $this->db->get();

    return $query->result();
  }
  
  function getDataEvaluasibyDate(){
    $this->db->select('*, DATE(tgl_evaluasi) as date, TIME(tgl_evaluasi) as time');
    $this->db->from('tbl_evaluasikerja');
    $this->db->where('DATE(tgl_evaluasi)',DATE('Y-m-d'));
    $query = $this->db->get();

    return $query->result();
  }

  function getDataHasil($id){
    $this->db->select('*');
    $this->db->from('tbl_penilaian');
    $this->db->where('evaluasiKerja_id', $id);
    $query = $this->db->get();

    return $query->result();
  }

  function getSumHasil($id){
    $this->db->select('SUM(parameter1) as total1, SUM(parameter2) as total2, SUM(parameter3) as total3, SUM(parameter4) as total4, SUM(parameter5) as total5, SUM(parameter6) as total6');
    $this->db->from('tbl_penilaian');
    $this->db->where('evaluasiKerja_id', $id);
    $query = $this->db->get();

    return $query->result();
  }
}