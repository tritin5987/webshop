<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TinTuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


	public function checkNumber()
	{
		$sql = "SELECT tintuc.*, nhanvien.HoTen FROM tintuc,nhanvien WHERE tintuc.MaNhanVien = nhanvien.MaNhanVien AND tintuc.TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 6){
		$sql = "SELECT tintuc.*, nhanvien.HoTen FROM tintuc, nhanvien WHERE tintuc.MaNhanVien = nhanvien.MaNhanVien AND tintuc.TrangThai = 1 ORDER BY tintuc.MaTinTuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getBySlug($DuongDan){
		$sql = "SELECT tintuc.*, nhanvien.HoTen FROM tintuc, nhanvien WHERE nhanvien.MaNhanVien = tintuc.MaNhanVien AND tintuc.DuongDan = ? AND tintuc.TrangThai = 1";
		$result = $this->db->query($sql, array($DuongDan));
		return $result->result_array();
	}

	public function getTag(){
		$sql = "SELECT The FROM tintuc WHERE TrangThai = 1 ORDER BY RAND()";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getRelated($DuongDan){
		$sql = "SELECT tintuc.*, nhanvien.HoTen FROM tintuc, nhanvien WHERE nhanvien.MaNhanVien = tintuc.MaNhanVien AND tintuc.DuongDan != ? AND tintuc.TrangThai = 1 ORDER BY RAND() LIMIT 2";
		$result = $this->db->query($sql, array($DuongDan));
		return $result->result_array();
	}

	public function getNew(){
		$sql = "SELECT * FROM tintuc WHERE TrangThai = 1 ORDER BY MaTinTuc DESC LIMIT 5";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function search($TieuDe){
		$TieuDe = '%'.$TieuDe.'%';
		$sql = "SELECT tintuc.*, nhanvien.HoTen FROM tintuc, nhanvien WHERE nhanvien.MaNhanVien = tintuc.MaNhanVien AND tintuc.TieuDe LIKE ? AND tintuc.TrangThai = 1";
		$result = $this->db->query($sql, array($TieuDe));
		return $result->result_array();
	}

}

/* End of file Model_TinTuc.php */
/* Location: ./application/models/Model_TinTuc.php */