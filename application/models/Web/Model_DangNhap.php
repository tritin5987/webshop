<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_DangNhap extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function checkAccount($taikhoan, $matkhau){
		$sql = "SELECT * FROM khachhang WHERE TaiKhoan = ? AND MatKhau = ?";
		$result = $this->db->query($sql, array($taikhoan, $matkhau));
		return $result->num_rows();
	}

	public function checkAccountBlock($taikhoan){
		$sql = "SELECT * FROM khachhang WHERE TrangThai = 0 AND TaiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->num_rows();
	}

	public function getInfoByUsername($taikhoan){
		$sql = "SELECT * FROM khachhang WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function getInfoByPhone($sodienthoai){
		$sql = "SELECT * FROM khachhang WHERE SoDienThoai = ?";
		$result = $this->db->query($sql, array($sodienthoai));
		return $result->result_array();
	}

	public function getInfoByEmail($email){
		$sql = "SELECT * FROM khachhang WHERE Email = ?";
		$result = $this->db->query($sql, array($email));
		return $result->result_array();
	}

}

/* End of file DangNhap.php */
/* Location: ./application/models/DangNhap.php */