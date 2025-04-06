<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_MaGiamGia extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkCode($magiamgia){
		$sql = "SELECT * FROM magiamgia WHERE Code = ? AND TrangThai != 0";
		$result = $this->db->query($sql, array($magiamgia));
		return $result->result_array();
	}

	public function updateCode($solandung,$magiamgia){
		$sql = "UPDATE `magiamgia` SET `DaSuDung`=? WHERE `Code`=?";
		$result = $this->db->query($sql, array($solandung,$magiamgia));
		return $result;
	}

}

/* End of file Model_MaGiamGia.php */
/* Location: ./application/models/Model_MaGiamGia.php */