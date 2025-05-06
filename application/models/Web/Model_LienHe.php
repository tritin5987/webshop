<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LienHe extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($makhachhang,$tieude,$noidung){
		$sql = "INSERT INTO `lienhe`(`MaKhachHang`, `TieuDe`, `NoiDung`) VALUES (?, ?, ?)";
		$result = $this->db->query($sql, array($makhachhang,$tieude,$noidung));
		return $result;
	}
}

/* End of file Model_LienHe.php */
/* Location: ./application/models/Model_LienHe.php */