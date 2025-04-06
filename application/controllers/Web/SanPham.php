<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SanPham extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_SanPham');
		$this->load->model('Web/Model_GiaoDien');
	}

	public function index()
	{
		$data['title'] = "Danh sách sản phẩm";
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['new'] = $this->Model_SanPham->getByType(1);
		$data['sale'] = $this->Model_SanPham->getByType(2);
		$data['popular'] = $this->Model_SanPham->getByType(3);
		$data['categoryNumber'] = $this->Model_SanPham->getCategoryNumber();

		if(isset($_GET['s']) && !empty($_GET['s'])){
			$data['totalPages'] = 0;
			$data['list'] = $this->Model_SanPham->search($_GET['s']);
			return $this->load->view('Web/View_SanPham', $data);
		}

		$totalRecords = $this->Model_SanPham->checkNumber();
		$recordsPerPage = 9;
		$totalPages = ceil($totalRecords / $recordsPerPage); 
		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_SanPham->getAll();

		return $this->load->view('Web/View_SanPham', $data);
	}

	public function page($trang){
		$data['title'] = "Danh sách sản phẩm";
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['new'] = $this->Model_SanPham->getByType(1);
		$data['sale'] = $this->Model_SanPham->getByType(2);
		$data['popular'] = $this->Model_SanPham->getByType(3);
		$data['categoryNumber'] = $this->Model_SanPham->getCategoryNumber();
		
		$totalRecords = $this->Model_SanPham->checkNumber();
		$recordsPerPage = 9;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('san-pham/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('san-pham/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAll();
			return $this->load->view('Web/View_SanPham', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAll($start);
			return $this->load->view('Web/View_SanPham', $data);
		}
	}

	public function detail($duongdan){
		if(count($this->Model_SanPham->getBySlug($duongdan)) <= 0){
			$data['title'] = "Không tìm thấy sản phẩm!";
			return $this->load->view('Web/404', $data);
		}

		$data['title'] = $this->Model_SanPham->getBySlug($duongdan)[0]['TenSanPham'];
		$data['detail'] = $this->Model_SanPham->getBySlug($duongdan);
		$data['categoryProduct'] = $this->Model_SanPham->getByCategory($this->Model_SanPham->getBySlug($duongdan)[0]['MaChuyenMuc'],$this->Model_SanPham->getBySlug($duongdan)[0]['MaSanPham']);
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['new'] = $this->Model_SanPham->getByType(1);
		$data['sale'] = $this->Model_SanPham->getByType(2);
		$data['popular'] = $this->Model_SanPham->getByType(3);
		$data['hot'] = $this->Model_SanPham->getByType(4);
		$data['suggest'] = $this->Model_SanPham->getSuggest();
		$data['categoryNumber'] = $this->Model_SanPham->getCategoryNumber();
		$data['tag'] = $this->Model_SanPham->getTag();
		return $this->load->view('Web/View_ChiTietSanPham', $data);
	}

}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */