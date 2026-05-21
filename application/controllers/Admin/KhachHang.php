<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KhachHang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_KhachHang');
	}

	public function index()
	{
		$totalRecords = $this->Model_KhachHang->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_KhachHang->getAll();
		$data['title'] = "Danh sách khách hàng";
		return $this->load->view('Admin/View_KhachHang', $data);
	}

	public function page($trang){
		$data['title'] = "Danh sách khách hàng";
		$totalRecords = $this->Model_KhachHang->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/khach-hang/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/khach-hang/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_KhachHang->getAll();
			return $this->load->view('Admin/View_KhachHang', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_KhachHang->getAll($start);
			return $this->load->view('Admin/View_KhachHang', $data);
		}
	}

	public function view($makhachhang){
		if(count($this->Model_KhachHang->getById($makhachhang)) <= 0){
			$this->session->set_flashdata('error', 'Khách hàng không tồn tại!');
			return redirect(base_url('admin/khach-hang/'));
		}

		$data['detail'] = $this->Model_KhachHang->getById($makhachhang);
		$data['title'] = "Thông tin khách hàng";
		return $this->load->view('Admin/View_XemKhachHang', $data);
	}

	public function status($makhachhang)
	{
		if(count($this->Model_KhachHang->getById($makhachhang)) <= 0){
			$this->session->set_flashdata('error', 'Khách hàng không tồn tại!');
			return redirect(base_url('admin/khach-hang/'));
		}

		$trangthai = $this->Model_KhachHang->getById($makhachhang)[0]['TrangThai'] == 0 ? 1 : 0;

		$this->Model_KhachHang->updateStatus($trangthai,$makhachhang);

		if($trangthai == 1){
			$this->session->set_flashdata('success', 'Bỏ cấm khách hàng thành công!');
		}else{
			$this->session->set_flashdata('success', 'Cấm khách hàng thành công!');
		}
		return redirect(base_url('admin/khach-hang/'.$makhachhang.'/xem/'));
	}

}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */