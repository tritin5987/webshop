<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_SanPham extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getById($MaSanPham){
		$sql = "SELECT * FROM sanpham WHERE MaSanPham = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaSanPham));
		return $result->result_array();
	}

	public function updateNumber($MaSanPham,$SoLuong){
		$sql = "UPDATE sanpham SET SoLuong = ? WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($SoLuong,$MaSanPham));
		return $result;
	}

	public function checkNumber()
	{
		$sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc FROM sanpham,chuyenmuc WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND sanpham.TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 9){
		$sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc FROM sanpham, chuyenmuc WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND sanpham.TrangThai = 1 ORDER BY sanpham.MaSanPham DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getBySlug($DuongDan){
		$sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc, chuyenmuc.DuongDan AS DuongDanChuyenMuc FROM sanpham, chuyenmuc WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND sanpham.DuongDan = ? AND sanpham.TrangThai = 1";
		$result = $this->db->query($sql, array($DuongDan));
		return $result->result_array();
	}

	public function getByCategory($MaChuyenMuc,$MaSanPham){
		$sql = "SELECT * FROM sanpham WHERE MaChuyenMuc = ? AND TrangThai = 1 AND MaSanPham != ? ORDER BY RAND() LIMIT 9";
		$result = $this->db->query($sql, array($MaChuyenMuc,$MaSanPham));
		return $result->result_array();
	}

	public function getCategoryNumber(){
		$sql = "SELECT cm.TenChuyenMuc, cm.DuongDan AS DuongDanChuyenMuc, COUNT(sp.MaSanPham) AS SoLuongSanPham FROM chuyenmuc cm LEFT JOIN sanpham sp ON cm.MaChuyenMuc = sp.MaChuyenMuc WHERE cm.TrangThai = 1 GROUP BY cm.TenChuyenMuc, cm.DuongDan;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}


	public function getByType($LoaiSanPham){
		$sql = "SELECT * FROM sanpham WHERE LoaiSanPham = ? AND TrangThai = 1 ORDER BY MaSanPham DESC LIMIT 9";
		$result = $this->db->query($sql, array($LoaiSanPham));
		return $result->result_array();
	}

	public function getSuggest(){
		$sql = "SELECT * FROM sanpham WHERE TrangThai = 1 ORDER BY RAND() LIMIT 9";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getImage(){
		$sql = "SELECT * FROM sanpham WHERE TrangThai = 1 ORDER BY RAND() DESC LIMIT 8";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getTag(){
		$sql = "SELECT The FROM sanpham WHERE TrangThai = 1 ORDER BY RAND()";
		$result = $this->db->query($sql);
		return $result->result_array();
	}


	public function search($TenSanPham){
		$TenSanPham = '%'.$TenSanPham.'%';
		$sql = "SELECT * FROM sanpham WHERE TrangThai = 1 AND TenSanPham LIKE ?";
		$result = $this->db->query($sql, array($TenSanPham));
		return $result->result_array();
	}
}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */