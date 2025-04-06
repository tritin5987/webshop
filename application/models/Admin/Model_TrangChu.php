<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TrangChu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getDonHangMoi(){
		$sql = "SELECT * FROM hoadon WHERE DAY(ThoiGian) = DAY(CURDATE()) AND MONTH(ThoiGian) = MONTH(CURDATE()) AND YEAR(ThoiGian) = YEAR(CURDATE())";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getDoanhThuNgay(){
		$sql = "SELECT COALESCE(SUM(TongTien), 0) AS TongTienSum FROM hoadon WHERE TrangThai = 3 AND DAY(ThoiGian) = DAY(CURDATE()) AND MONTH(ThoiGian) = MONTH(CURDATE()) AND YEAR(ThoiGian) = YEAR(CURDATE())";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getKhachHangMoi(){
		$sql = "SELECT * FROM khachhang WHERE DAY(NgayThamGia) = DAY(CURDATE()) AND MONTH(NgayThamGia) = MONTH(CURDATE()) AND YEAR(NgayThamGia) = YEAR(CURDATE())";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getSoLuongSanPham(){
		$sql = "SELECT COALESCE(SUM(SoLuong), 0) AS TongSoLuong FROM sanpham WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getSumRevenue($thang){
		$sql = "SELECT SUM(TongTien) AS TongTien FROM hoadon WHERE TrangThai = 3 AND MONTH(ThoiGian) = ? AND YEAR(ThoiGian) = YEAR(CURDATE())";
		$result = $this->db->query($sql, array($thang));
		return $result->result_array();
	}

	public function getHistory(){
		$sql = "SELECT sanpham.TenSanPham, nhanvien.HoTen, lichsunhap.* FROM sanpham, nhanvien, lichsunhap WHERE lichsunhap.MaNhanVien = nhanvien.MaNhanVien AND lichsunhap.MaSanPham = sanpham.MaSanPham ORDER BY lichsunhap.MaLichSuNhap DESC LIMIT 10";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getTongChuyenMuc(){
		$sql = "SELECT COALESCE(COUNT(*), 0) AS TongChuyenMuc FROM chuyenmuc WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getTongLoaiSanPham(){
		$sql = "SELECT COALESCE(COUNT(*), 0) AS TongSanPham FROM sanpham WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getTongMaGiamGia(){
		$sql = "SELECT COALESCE(COUNT(*), 0) AS TongMaGiamGia FROM magiamgia WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getTongKhachHang(){
		$sql = "SELECT COALESCE(COUNT(*), 0) AS TongKhachHang FROM khachhang WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}


	public function getSumOrder($thang){
		$sql = "SELECT COUNT(*) AS TongDon FROM hoadon WHERE MONTH(ThoiGian) = ? AND YEAR(ThoiGian) = YEAR(CURDATE())";
		$result = $this->db->query($sql, array($thang));
		return $result->result_array();
	}

	public function getSell($thang){
		$sql = "SELECT COALESCE(SUM(SoLuong), 0) AS SanPham FROM hoadon WHERE TrangThai = 3 AND MONTH(ThoiGian) = ? AND YEAR(ThoiGian) = YEAR(CURDATE())";
		$result = $this->db->query($sql, array($thang));
		return $result->result_array();
	}

	public function getSumOrderWeek(){
		$sql = "SELECT COUNT(*) AS TongDon FROM hoadon WHERE ThoiGian BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() + 1;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getSumRevenueWeek(){
		$sql = "SELECT COALESCE(SUM(TongTien), 0) AS TongTien FROM hoadon WHERE TrangThai = 3 AND ThoiGian BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() + 1;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getSellWeek(){
		$sql = "SELECT COALESCE(SUM(SoLuong), 0) AS SanPham FROM hoadon WHERE TrangThai = 3 AND ThoiGian BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() + 1;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

/* End of file Model_TrangChu.php */
/* Location: ./application/models/Model_TrangChu.php */