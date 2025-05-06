<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TinTuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tieude,$noidung,$duongdan,$the,$manhanvien,$hinhanh){
		$data = array(
	        "TieuDe" => $tieude,
	        "NoiDung" => $noidung,
	        "DuongDan" => $duongdan,
	        "The" => $the,
	        "MaNhanVien" => $manhanvien,
	        "HinhAnh" => $hinhanh,
	    );

	    $this->db->insert('tintuc', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM tintuc WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM tintuc WHERE TrangThai = 1 ORDER BY MaTinTuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function checkNumberSearch($search)
	{
	    // Tạo câu query cơ bản
	    $sql = "SELECT * FROM tintuc WHERE TrangThai = 1";

	    // Nếu có từ khóa tìm kiếm, thêm điều kiện LIKE
	    if (!empty($search)) {
	        $sql .= " AND TieuDe LIKE ?";
	        $params = array("%$search%");
	    } else {
	        $params = array();
	    }

	    // Thực thi câu query
	    $result = $this->db->query($sql, $params);
	    return $result->num_rows();
	}

	public function getAllSearch($search, $start = 0, $end = 10)
	{
	    // Tạo câu query cơ bản
	    $sql = "SELECT * FROM tintuc WHERE TrangThai = 1";

	    // Nếu có từ khóa tìm kiếm, thêm điều kiện LIKE
	    if (!empty($search)) {
	        $sql .= " AND TieuDe LIKE ?";
	        $params = array("%$search%", $start, $end);
	    } else {
	        $params = array($start, $end);
	    }

	    // Thêm sắp xếp và phân trang
	    $sql .= " ORDER BY MaTinTuc DESC LIMIT ?, ?";

	    // Thực thi câu query
	    $result = $this->db->query($sql, $params);
	    return $result->result_array();
	}

	public function getById($MaTinTuc){
		$sql = "SELECT * FROM tintuc WHERE MaTinTuc = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaTinTuc));
		return $result->result_array();
	}

	public function update($tieude,$noidung,$duongdan,$the,$manhanvien,$hinhanh,$matintuc){
		$sql = "UPDATE tintuc SET TieuDe = ?, NoiDung = ?, DuongDan = ?, The = ?, MaNhanVien = ?, HinhAnh = ? WHERE MaTinTuc = ?";
		$result = $this->db->query($sql, array($tieude,$noidung,$duongdan,$the,$manhanvien,$hinhanh,$matintuc));
		return $result;
	}

	public function delete($MaTinTuc){
		$sql = "UPDATE tintuc SET TrangThai = 0 WHERE MaTinTuc = ?";
		$result = $this->db->query($sql, array($MaTinTuc));
		return $result;
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */