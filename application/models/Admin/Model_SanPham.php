<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_SanPham extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($TenSanPham,$DuongDan,$GiaGoc,$GiaBan,$LoaiSanPham,$AnhChinh,$HinhAnh,$MoTaNgan,$MoTaDai,$MaChuyenMuc,$The){
		$data = array(
	        "TenSanPham" => $TenSanPham,
	        "DuongDan" => $DuongDan,
	        "GiaGoc" => $GiaGoc,
	        "GiaBan" => $GiaBan,
	        "LoaiSanPham" => $LoaiSanPham,
	        "AnhChinh" => $AnhChinh,
	        "HinhAnh" => $HinhAnh,
	        "MoTaNgan" => $MoTaNgan,
	        "MoTaDai" => $MoTaDai,
	        "MaChuyenMuc" => $MaChuyenMuc,
	        "The" => $The
	    );

	    $this->db->insert('sanpham', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function getByIdCategory($MaChuyenMuc){
		$sql = "SELECT * FROM sanpham WHERE MaChuyenMuc = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaChuyenMuc));
		return $result->result_array();
	}

	public function checkNumber()
	{
		$sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc FROM sanpham,chuyenmuc WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND sanpham.TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc FROM sanpham, chuyenmuc WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND sanpham.TrangThai = 1 ORDER BY sanpham.MaSanPham DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function checkNumberSearch($search)
	{
	    // Xử lý giá trị $search để tránh SQL Injection
	    $search = $this->db->escape_str($search);
	    
	    // Thêm điều kiện tìm kiếm vào câu query
	    $sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc 
	            FROM sanpham, chuyenmuc 
	            WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc 
	              AND sanpham.TrangThai = 1 
	              AND (sanpham.TenSanPham LIKE '%$search%' 
	                   OR chuyenmuc.TenChuyenMuc LIKE '%$search%')";
	                   
	    $result = $this->db->query($sql);
	    return $result->num_rows();
	}

	public function getAllSearch($search, $start = 0, $end = 10)
	{
	    // Tạo câu query cơ bản
	    $sql = "SELECT sanpham.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc 
	            FROM sanpham, chuyenmuc 
	            WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc 
	              AND sanpham.TrangThai = 1";

	    // Nếu có từ khóa tìm kiếm, thêm điều kiện LIKE
	    if (!empty($search)) {
	        $sql .= " AND (sanpham.TenSanPham LIKE ? OR chuyenmuc.TenChuyenMuc LIKE ?)";
	        $params = array("%$search%", "%$search%", $start, $end);
	    } else {
	        $params = array($start, $end);
	    }

	    // Sắp xếp và phân trang
	    $sql .= " ORDER BY sanpham.MaSanPham DESC LIMIT ?, ?";

	    // Thực thi câu query
	    $result = $this->db->query($sql, $params);
	    return $result->result_array();
	}

	public function getById($MaSanPham){
		$sql = "SELECT * FROM sanpham WHERE MaSanPham = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaSanPham));
		return $result->result_array();
	}

	public function update($TenSanPham,$DuongDan,$GiaGoc,$GiaBan,$LoaiSanPham,$AnhChinh,$HinhAnh,$MoTaNgan,$MoTaDai,$MaChuyenMuc,$The,$MaSanPham){
		$sql = "UPDATE sanpham SET TenSanPham = ?, DuongDan = ?, GiaGoc = ?, GiaBan = ?, LoaiSanPham = ?, AnhChinh = ?, HinhAnh = ?, MoTaNgan = ?, MoTaDai = ?, MaChuyenMuc = ?, The = ? WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($TenSanPham,$DuongDan,$GiaGoc,$GiaBan,$LoaiSanPham,$AnhChinh,$HinhAnh,$MoTaNgan,$MoTaDai,$MaChuyenMuc,$The,$MaSanPham));
		return $result;
	}

	public function delete($MaSanPham){
		$sql = "UPDATE sanpham SET TrangThai = 0 WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($MaSanPham));
		return $result;
	}

	public function import($soluong,$MaSanPham){
		$sql = "UPDATE sanpham SET SoLuong = ? WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($soluong,$MaSanPham));
		return $result;
	}

	public function history($masanpham,$manhanvien,$soluongcu,$soluongmoi){
		$data = array(
	        "MaSanPham" => $masanpham,
	        "MaNhanVien" => $manhanvien,
	        "SoLuongCu" => $soluongcu,
	        "SoLuongMoi" => $soluongmoi
	    );

	    $this->db->insert('lichsunhap', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}


	public function getHistory($masanpham){
		$sql = "SELECT sanpham.TenSanPham, nhanvien.HoTen, lichsunhap.* FROM sanpham, nhanvien, lichsunhap WHERE lichsunhap.MaNhanVien = nhanvien.MaNhanVien AND lichsunhap.MaSanPham = sanpham.MaSanPham AND lichsunhap.MaSanPham = ? ORDER BY lichsunhap.MaLichSuNhap DESC";
		$result = $this->db->query($sql, array($masanpham));
		return $result->result_array();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */