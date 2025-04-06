<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_HoaDon extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tongtien, $thanhtoan, $soluong, $diachi, $tenkhachhang, $sodienthoai, $muataiquan){
		$data = array(
	        "TongTien" => $tongtien,
	        "ThanhToan" => $thanhtoan,
	        "SoLuong" => $soluong,
	        "DiaChi" => $diachi,
	        "SoDienThoai" => $sodienthoai,
	        "MuaTaiQuan" => $muataiquan,
	        "TenKhachHang" => $tenkhachhang,
	    );

	    $this->db->insert('hoadon', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function getProductDetail($mahoadon){
		$sql = "SELECT sanpham.TenSanPham, sanpham.HinhAnh, chitiethoadon.* FROM chitiethoadon, sanpham WHERE chitiethoadon.MaSanPham = sanpham.MaSanPham AND chitiethoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($mahoadon));
		return $result->result_array();
	}

	public function addDetail($mahoadon, $masanpham, $soluong){
		$data = array(
	        "MaHoaDon" => $mahoadon,
	        "MaSanPham" => $masanpham,
	        "SoLuong" => $soluong
	    );

	    $this->db->insert('chitiethoadon', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function update($TongTien, $SoLuong, $MaHoaDon){
		$sql = "UPDATE hoadon SET TongTien = ?, SoLuong = ? WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($TongTien, $SoLuong, $MaHoaDon));
		return $result;
	}

	public function deleteProductOrder($machitiethoadon){
		$sql = "DELETE FROM chitiethoadon WHERE MaChiTietHoaDon = ?";
		$result = $this->db->query($sql, array($machitiethoadon));
		return $result;
	}

	public function checkNumber()
	{	
		$sql = "SELECT * FROM hoadon";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.TrangThai FROM hoadon LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia ORDER BY hoadon.MaHoaDon DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getByIdTaiQuan($MaHoaDon){
		$sql = "SELECT hoadon.*, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam FROM hoadon LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE hoadon.MaHoaDon = ? AND hoadon.MuaTaiQuan = 1";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result->result_array();
	}

	public function getById($MaHoaDon){
		$sql = "SELECT khachhang.HoTen, khachhang.SoDienThoai, khachhang.MaKhachHang, hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.DiaChi, hoadon.TrangThai FROM hoadon INNER JOIN khachhang ON hoadon.MaKhachHang = khachhang.MaKhachHang LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE hoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result->result_array();
	}

	public function getByIdAction($MaHoaDon){
		$sql = "SELECT * FROM hoadon WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result->result_array();
	}

	public function getDetailById($MaHoaDon){
		$sql = "SELECT chitiethoadon.*, sanpham.TenSanPham, sanpham.HinhAnh, sanpham.GiaBan FROM chitiethoadon, sanpham WHERE chitiethoadon.MaSanPham = sanpham.MaSanPham AND chitiethoadon.MaHoaDon = ?";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result->result_array();
	}

	public function getDetailDelete($MaChiTietHoaDon){
		$sql = "SELECT chitiethoadon.*, sanpham.TenSanPham, sanpham.HinhAnh, sanpham.GiaBan FROM chitiethoadon, sanpham WHERE chitiethoadon.MaSanPham = sanpham.MaSanPham AND chitiethoadon.MaChiTietHoaDon = ?";
		$result = $this->db->query($sql, array($MaChiTietHoaDon));
		return $result->result_array();
	}

	public function updatePay($MaHoaDon){
		$sql = "UPDATE hoadon SET ThanhToan = 1 WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result;
	}

	public function cancel($MaHoaDon){
		$sql = "UPDATE hoadon SET TrangThai = 0 WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($MaHoaDon));
		return $result;
	}

	public function status($trangthai,$MaHoaDon){
		$sql = "UPDATE hoadon SET TrangThai = ? WHERE MaHoaDon = ?";
		$result = $this->db->query($sql, array($trangthai,$MaHoaDon));
		return $result;
	}

	public function getProductById($masanpham){
		$sql = "SELECT * FROM sanpham WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($masanpham));
		return $result->result_array();
	}

	public function updateNumberProduct($soluong,$masanpham){
		$sql = "UPDATE sanpham SET SoLuong = ? WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($soluong,$masanpham));
		return $result;
	}

	public function checkNumberSearch($madonhang,$thanhtoan,$trangthai){
		$sql = "SELECT hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.TrangThai FROM hoadon LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE hoadon.MaHoaDon = ? OR hoadon.ThanhToan = ? OR hoadon.TrangThai = ? ORDER BY hoadon.MaHoaDon";
		$result = $this->db->query($sql, array($madonhang,$thanhtoan,$trangthai));
		return $result->num_rows();
	}

	public function search($madonhang,$thanhtoan,$trangthai,$start = 0, $end = 10){
		$sql = "SELECT hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.TrangThai FROM hoadon LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE hoadon.MaHoaDon = ? OR hoadon.ThanhToan = ? OR hoadon.TrangThai = ? ORDER BY hoadon.MaHoaDon DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($madonhang,$thanhtoan,$trangthai,$start,$end));
		return $result->result_array();
	}

	public function checkNumberType($type){
		if($type == "thang"){
			$sql = "SELECT hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.TrangThai FROM hoadon LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE MONTH(hoadon.ThoiGian) = ? AND YEAR(hoadon.ThoiGian) = YEAR(CURDATE()) ORDER BY hoadon.MaHoaDon DESC";
			$result = $this->db->query($sql, array(date('m')));
			return $result->num_rows();
		}else if($type == "tuan"){
			$sql = "SELECT hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.TrangThai FROM hoadon LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE hoadon.ThoiGian BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() + 1 ORDER BY hoadon.MaHoaDon DESC";
			$result = $this->db->query($sql, array(date('m')));
			return $result->num_rows();
		}
	}

	public function getType($type,$start = 0,$end = 10){
		if($type == "thang"){
			$sql = "SELECT hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.TrangThai FROM hoadon LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE MONTH(hoadon.ThoiGian) = ? AND YEAR(hoadon.ThoiGian) = YEAR(CURDATE()) ORDER BY hoadon.MaHoaDon DESC LIMIT ?, ?";
			$result = $this->db->query($sql, array(date('m'), $start, $end));
			return $result->result_array();
		}else if($type == "tuan"){
			$sql = "SELECT hoadon.MaHoaDon, hoadon.MaKhachHang, hoadon.TongTien, hoadon.ThoiGian, hoadon.ThanhToan, COALESCE(magiamgia.GiaTriGiam, 0) AS GiaTriGiam, hoadon.SoLuong, hoadon.TrangThai FROM hoadon LEFT JOIN magiamgia ON hoadon.MaGiamGia = magiamgia.MaGiamGia WHERE hoadon.ThoiGian BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() + 1 ORDER BY hoadon.MaHoaDon DESC LIMIT ?, ?";
			$result = $this->db->query($sql, array($start, $end));
			return $result->result_array();
		}
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */