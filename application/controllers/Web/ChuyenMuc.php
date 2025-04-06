<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChuyenMuc extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_ChuyenMuc');
		$this->load->model('Web/Model_GiaoDien');
		$this->load->model('Web/Model_SanPham');
	}

	public function index()
	{
		$data['title'] = "Danh sách chuyên mục";

		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 6;
		$totalPages = ceil($totalRecords / $recordsPerPage); 
		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ChuyenMuc->getAllCategory();
		return $this->load->view('Web/View_ChuyenMuc', $data);
	}

	public function page($trang){
		$data['title'] = "Danh sách chuyên mục";
	
		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 6;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('chuyen-muc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('chuyen-muc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;

		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllCategory();
			return $this->load->view('Web/View_ChuyenMuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllCategory($start);
			return $this->load->view('Web/View_ChuyenMuc', $data);
		}
	}

	public function detail($duongdan){
		if(count($this->Model_ChuyenMuc->getBySlug($duongdan)) <= 0){
			$data['title'] = "Không tìm thấy chuyên mục";
			return $this->load->view('Web/404', $data);
		}

		$data['title'] = $this->Model_ChuyenMuc->getBySlug($duongdan)[0]['TenChuyenMuc'];
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['new'] = $this->Model_SanPham->getByType(1);
		$data['sale'] = $this->Model_SanPham->getByType(2);
		$data['popular'] = $this->Model_SanPham->getByType(3);
		$data['categoryNumber'] = $this->Model_SanPham->getCategoryNumber();

		$totalRecords = $this->Model_ChuyenMuc->checkNumberProduct($this->Model_ChuyenMuc->getBySlug($duongdan)[0]['MaChuyenMuc']);
		$recordsPerPage = 9;
		$totalPages = ceil($totalRecords / $recordsPerPage); 
		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ChuyenMuc->getBySlug($duongdan);
		$data['slugCategory'] = $duongdan;
		return $this->load->view('Web/View_SanPham', $data);
	}

	public function detailPage($duongdan,$trang){
		$data['title'] = $this->Model_ChuyenMuc->getBySlug($duongdan)[0]['TenChuyenMuc'];
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['new'] = $this->Model_SanPham->getByType(1);
		$data['sale'] = $this->Model_SanPham->getByType(2);
		$data['popular'] = $this->Model_SanPham->getByType(3);
		$data['categoryNumber'] = $this->Model_SanPham->getCategoryNumber();
		
		$totalRecords = $this->Model_ChuyenMuc->checkNumberProduct($this->Model_ChuyenMuc->getBySlug($duongdan)[0]['MaChuyenMuc']);
		$recordsPerPage = 9;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('chuyen-muc/'.$duongdan.'/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('chuyen-muc/'.$duongdan.'/'));
		}

		$start = ($trang - 1) * $recordsPerPage;

		$data['slugCategory'] = $duongdan;
		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getBySlug($duongdan);
			return $this->load->view('Web/View_SanPham', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getBySlug($duongdan,$start);
			return $this->load->view('Web/View_SanPham', $data);
		}
	}

}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */