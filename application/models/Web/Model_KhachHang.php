<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_KhachHang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($hoten,$taikhoan,$matkhau,$sodienthoai,$email,$diachi){
		$sql = "INSERT INTO `khachhang`(`HoTen`, `TaiKhoan`, `MatKhau`, `SoDienThoai`, `Email`, `DiaChi`) VALUES (?, ?, ?, ?, ?, ?)";
		$result = $this->db->query($sql, array($hoten,$taikhoan,$matkhau,$sodienthoai,$email,$diachi));
		return $result;
	}


	public function getOrderById($makhachhang){
		$sql = "SELECT * FROM hoadon WHERE MaKhachHang = ? ORDER BY MaHoaDon DESC";
		$result = $this->db->query($sql, array($makhachhang));
		return $result->result_array();
	}

	public function update($hoten,$matkhau,$sodienthoai,$email,$diachhi,$makhachhang){
		$sql = "UPDATE `khachhang` SET `HoTen` = ?, `MatKhau` = ?, `SoDienThoai` = ?, `Email` = ?, `DiaChi` = ? WHERE MaKhachHang = ?";
		$result = $this->db->query($sql, array($hoten,$matkhau,$sodienthoai,$email,$diachhi,$makhachhang));
		return $result;
	}

	public function getOrderDetailById($MaHoaDon){
		$sql = "SELECT chitiethoadon.*, sanpham.TenSanPham, sanpham.DuongDan, sanpham.HinhAnh, sanpham.GiaBan FROM chitiethoadon, sanpham WHERE chitiethoadon.MaSanPham = sanpham.MaSanPham AND chitiethoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result->result_array();
	}


	public function getById($MaHoaDon){
		$sql = "SELECT khachhang.HoTen, khachhang.MaKhachHang, hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.DiaChi, hoadon.TrangThai FROM hoadon INNER JOIN khachhang ON hoadon.MaKhachHang = khachhang.MaKhachHang LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE hoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result->result_array();
	}

	public function cancel($MaHoaDon){
		$sql = "UPDATE `hoadon` SET `TrangThai` = 0 WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result;
	}
}	

/* End of file Model_KhachHang.php */
/* Location: ./application/models/Model_KhachHang.php */