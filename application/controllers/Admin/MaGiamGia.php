<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MaGiamGia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_MaGiamGia');
	}

	public function index()
	{
		$search = $this->input->get('search');

		if(!empty($search)){
			$totalRecords = $this->Model_MaGiamGia->checkNumberSearch($search);
			$recordsPerPage = 10;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_MaGiamGia->getAllSearch($search);
			$data['title'] = "Mã giảm giá sản phẩm";
			return $this->load->view('Admin/View_MaGiamGia', $data);
		}

		$totalRecords = $this->Model_MaGiamGia->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_MaGiamGia->getAll();
		$data['title'] = "Mã giảm giá sản phẩm";
		return $this->load->view('Admin/View_MaGiamGia', $data);
	}

	public function page($trang){
		$data['title'] = "Mã giảm giá cửa hàng";
		$totalRecords = $this->Model_MaGiamGia->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/ma-giam-gia/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/ma-giam-gia/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_MaGiamGia->getAll();
			return $this->load->view('Admin/View_MaGiamGia', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_MaGiamGia->getAll($start);
			return $this->load->view('Admin/View_MaGiamGia', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm mã giảm giá sản phẩm";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$code = $this->input->post('code');
			$soluong = $this->input->post('soluong');
			$giatrigiam = $this->input->post('giatrigiam');
			$thoigian = $this->input->post('thoigian');

			if(empty($code) || empty($soluong) || empty($giatrigiam) || empty($thoigian)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			$this->Model_MaGiamGia->add(strtoupper($code),$soluong,0,$giatrigiam,$thoigian);

			$this->session->set_flashdata('success', 'Thêm mã giảm giá thành công!');
			return redirect(base_url('admin/ma-giam-gia/'));
		}
		return $this->load->view('Admin/View_ThemMaGiamGia', $data);
	}

	public function update($magiamgia)
	{
		if(count($this->Model_MaGiamGia->getById($magiamgia)) <= 0){
			$this->session->set_flashdata('error', 'Mã giảm giá không tồn tại!');
			return redirect(base_url('admin/ma-giam-gia/'));
		}

		$data['title'] = "Cập nhật mã giảm giá sản phẩm";
		$data['detail'] = $this->Model_MaGiamGia->getById($magiamgia);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$code = $this->input->post('code');
			$soluong = $this->input->post('soluong');
			$giatrigiam = $this->input->post('giatrigiam');
			$thoigian = $this->input->post('thoigian');

			if(empty($code) || empty($soluong) || empty($giatrigiam) || empty($thoigian)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaMaGiamGia', $data);
			}

			$this->Model_MaGiamGia->update(strtoupper($code),$soluong,$giatrigiam,$thoigian,$magiamgia);
			$data['success'] = "Cập nhật mã giảm giá thành công!";
			$data['detail'] = $this->Model_MaGiamGia->getById($magiamgia);
			return $this->load->view('Admin/View_SuaMaGiamGia', $data);
		}

		return $this->load->view('Admin/View_SuaMaGiamGia', $data);
	}



	public function delete($magiamgia)
	{
		if(count($this->Model_MaGiamGia->getById($magiamgia)) <= 0){
			$this->session->set_flashdata('error', 'Mã giảm giá không tồn tại!');
			return redirect(base_url('admin/ma-giam-gia/'));
		}
		$this->Model_MaGiamGia->delete($magiamgia);

		$this->session->set_flashdata('success', 'Xóa mã giảm giá thành công!');
		return redirect(base_url('admin/ma-giam-gia/'));
	}
}

/* End of file MaGiamGia.php */
/* Location: ./application/controllers/MaGiamGia.php */