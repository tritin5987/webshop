<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_HoaDon extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function addWithSale($MaKhachHang,$TongTien,$ThanhToan,$MaGiamGia,$SoLuong,$DiaChi){
		$data = array(
	        "MaKhachHang" => $MaKhachHang,
	        "TongTien" => $TongTien,
	        "ThanhToan" => $ThanhToan,
	        "MaGiamGia" => $MaGiamGia,
	        "SoLuong" => $SoLuong,
	        "DiaChi" => $DiaChi
	    );

	    $this->db->insert('hoadon', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function addWithoutSale($MaKhachHang,$TongTien,$ThanhToan,$SoLuong,$DiaChi){
		$data = array(
	        "MaKhachHang" => $MaKhachHang,
	        "TongTien" => $TongTien,
	        "ThanhToan" => $ThanhToan,
	        "SoLuong" => $SoLuong,
	        "DiaChi" => $DiaChi
	    );

	    $this->db->insert('hoadon', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function addDetail($MaHoaDon,$MaSanPham,$SoLuong){
		$data = array(
	        "MaHoaDon" => $MaHoaDon,
	        "MaSanPham" => $MaSanPham,
	        "SoLuong" => $SoLuong
	    );

	    $this->db->insert('chitiethoadon', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

}

/* End of file Model_HoaDon.php */
/* Location: ./application/models/Model_HoaDon.php */