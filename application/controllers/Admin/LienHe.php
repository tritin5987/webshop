<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LienHe extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_LienHe');
	}

	public function index()
	{
		$totalRecords = $this->Model_LienHe->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_LienHe->getAll();
		$data['title'] = "Liên hệ khách hàng";
		return $this->load->view('Admin/View_LienHe', $data);
	}

	public function page($trang){
		$data['title'] = "Liên hệ khách hàng";
		$totalRecords = $this->Model_LienHe->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/lien-he/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/lien-he/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LienHe->getAll();
			return $this->load->view('Admin/View_LienHe', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LienHe->getAll($start);
			return $this->load->view('Admin/View_LienHe', $data);
		}
	}

	public function view($malienhe)
	{
		if(count($this->Model_LienHe->getById($malienhe)) <= 0){
			$this->session->set_flashdata('error', 'Liên hệ không tồn tại!');
			return redirect(base_url('admin/lien-he/'));
		}

		$data['title'] = "Xem chi tiết liên hệ khách hàng";
		$data['detail'] = $this->Model_LienHe->getById($malienhe);

		return $this->load->view('Admin/View_XemLienHe', $data);
	}

}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */