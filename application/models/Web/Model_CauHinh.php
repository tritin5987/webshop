<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_CauHinh extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getAll(){
		$sql = "SELECT * FROM cauhinh";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

}

/* End of file Model_CauHinh.php */
/* Location: ./application/controllers/Model_CauHinh.php */