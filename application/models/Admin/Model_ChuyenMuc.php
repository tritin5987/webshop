<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ChuyenMuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tenchuyenmuc,$duongdan,$hinhanh){
		$data = array(
	        "TenChuyenMuc" => $tenchuyenmuc,
	        "DuongDan" => $duongdan,
	        "HinhAnh" => $hinhanh,
	    );

	    $this->db->insert('chuyenmuc', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 ORDER BY MaChuyenMuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getAllSearch($search, $start = 0, $end = 10)
	{
	    // Tạo câu query cơ bản
	    $sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1";

	    // Nếu có từ khóa tìm kiếm, thêm điều kiện LIKE
	    if (!empty($search)) {
	        $sql .= " AND TenChuyenMuc LIKE ?";
	        $params = array("%$search%", $start, $end);
	    } else {
	        $params = array($start, $end);
	    }

	    // Thêm sắp xếp và phân trang
	    $sql .= " ORDER BY MaChuyenMuc DESC LIMIT ?, ?";

	    // Thực thi câu query
	    $result = $this->db->query($sql, $params);
	    return $result->result_array();
	}


	public function checkNumberSearch($search)
	{
	    // Tạo câu query cơ bản
	    $sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1";

	    // Nếu có từ khóa tìm kiếm, thêm điều kiện LIKE
	    if (!empty($search)) {
	        $sql .= " AND TenChuyenMuc LIKE ?";
	        $params = array("%$search%");
	    } else {
	        $params = array();
	    }

	    // Thực thi câu query
	    $result = $this->db->query($sql, $params);
	    return $result->num_rows();
	}

	public function getById($MaChuyenMuc){
		$sql = "SELECT * FROM chuyenmuc WHERE MaChuyenMuc = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaChuyenMuc));
		return $result->result_array();
	}

	public function update($tenchuyenmuc,$duongdan,$hinhanh,$machuyenmuc){
		$sql = "UPDATE chuyenmuc SET TenChuyenMuc = ?, DuongDan = ?, HinhAnh = ? WHERE MaChuyenMuc = ?";
		$result = $this->db->query($sql, array($tenchuyenmuc,$duongdan,$hinhanh,$machuyenmuc));
		return $result;
	}

	public function delete($machuyenmuc){
		$sql = "UPDATE chuyenmuc SET TrangThai = 0 WHERE MaChuyenMuc = ?";
		$result = $this->db->query($sql, array($machuyenmuc));
		return $result;
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */