<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GiaoDien extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($MaChuyenMuc,$HinhAnh,$LoaiGiaoDien){
		$data = array(
	        "MaChuyenMuc" => $MaChuyenMuc,
	        "HinhAnh" => $HinhAnh,
	        "LoaiGiaoDien" => $LoaiGiaoDien,
	    );

	    $this->db->insert('giaodien', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM giaodien WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT giaodien.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc FROM giaodien, chuyenmuc WHERE giaodien.TrangThai = 1 AND giaodien.MaChuyenMuc = chuyenmuc.MaChuyenMuc ORDER BY MaGiaoDien DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaGiaoDien){
		$sql = "SELECT * FROM giaodien WHERE MaGiaoDien = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaGiaoDien));
		return $result->result_array();
	}

	public function update($MaChuyenMuc,$HinhAnh,$LoaiGiaoDien,$MaGiaoDien){
		$sql = "UPDATE giaodien SET MaChuyenMuc = ?, HinhAnh = ?, LoaiGiaoDien = ? WHERE MaGiaoDien = ?";
		$result = $this->db->query($sql, array($MaChuyenMuc,$HinhAnh,$LoaiGiaoDien,$MaGiaoDien));
		return $result;
	}

	public function delete($MaGiaoDien){
		$sql = "UPDATE giaodien SET TrangThai = 0 WHERE MaGiaoDien = ?";
		$result = $this->db->query($sql, array($MaGiaoDien));
		return $result;
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */