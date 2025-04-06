<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GiaoDien extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getByType($LoaiGiaoDien){
		$sql = "SELECT giaodien.*, chuyenmuc.DuongDan FROM giaodien, chuyenmuc WHERE giaodien.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND giaodien.LoaiGiaoDien = ? AND giaodien.TrangThai = 1 ORDER BY giaodien.MaGiaoDien DESC";
		$result = $this->db->query($sql, array($LoaiGiaoDien));
		return $result->result_array();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */