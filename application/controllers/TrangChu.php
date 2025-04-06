<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrangChu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$data = array();
		$this->load->model('Web/Model_GiaoDien');
		$this->load->model('Web/Model_SanPham');
		$this->load->model('Web/Model_ChuyenMuc');
	}

	public function index()
	{
		$data['title'] = $this->data['config'][0]['TenWebsite'];
		$data['slide'] = $this->Model_GiaoDien->getByType(1);
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['banner2'] = $this->Model_GiaoDien->getByType(3);
		$data['banner3'] = $this->Model_GiaoDien->getByType(4);
		$data['new'] = $this->Model_SanPham->getByType(1);
		$data['sale'] = $this->Model_SanPham->getByType(2);
		$data['popular'] = $this->Model_SanPham->getByType(3);
		$data['hot'] = $this->Model_SanPham->getByType(4);
		$data['suggest'] = $this->Model_SanPham->getSuggest();
		$data['category'] = $this->Model_ChuyenMuc->getAll();
		return $this->load->view('Web/View_TrangChu', $data);
	}

}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */