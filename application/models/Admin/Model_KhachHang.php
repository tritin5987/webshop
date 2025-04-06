<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_KhachHang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM khachhang";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM khachhang ORDER BY MaKhachHang DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaKhachHang){
		$sql = "SELECT * FROM khachhang WHERE MaKhachHang = ?";
		$result = $this->db->query($sql, array($MaKhachHang));
		return $result->result_array();
	}

	public function updateStatus($TrangThai,$MaKhachHang){
		$sql = "UPDATE khachhang SET TrangThai = ? WHERE MaKhachHang = ?";
		$result = $this->db->query($sql, array($TrangThai,$MaKhachHang));
		return $result;
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */