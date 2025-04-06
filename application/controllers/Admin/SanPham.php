<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SanPham extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_SanPham');
		$this->load->model('Admin/Model_ChuyenMuc');
	}

	public function index()
	{
		$search = $this->input->get('search');

		if(!empty($search)){
			$totalRecords = $this->Model_SanPham->checkNumberSearch($search);
			$recordsPerPage = 10;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAllSearch($search);
			$data['title'] = "Danh sách sản phẩm";
			return $this->load->view('Admin/View_SanPham', $data);
		}
		

		$totalRecords = $this->Model_SanPham->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_SanPham->getAll();
		$data['title'] = "Danh sách sản phẩm";
		return $this->load->view('Admin/View_SanPham', $data);
	}

	public function page($trang){
		$data['title'] = "Danh sách sản phẩm";
		$totalRecords = $this->Model_SanPham->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/san-pham/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/san-pham/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAll();
			return $this->load->view('Admin/View_SanPham', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAll($start);
			return $this->load->view('Admin/View_SanPham', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm sản phẩm mới";
		$data['category'] = $this->Model_ChuyenMuc->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tensanpham = $this->input->post('tensanpham');
			$duongdan = $this->input->post('duongdan');
			$machuyenmuc = $this->input->post('machuyenmuc');
			$giagoc = $this->input->post('giagoc');
			$giaban = $this->input->post('giaban');
			$loaisanpham = $this->input->post('loaisanpham');
			$motadai = $this->input->post('motadai');
			$motangan = $this->input->post('motangan');
			$the = $this->input->post('the');
			$anhchinh = "";

			if(empty($tensanpham) || empty($duongdan) || empty($giagoc) || empty($giaban) || empty($the) || empty($motangan) || empty($motadai)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			if(count($this->Model_ChuyenMuc->getById($machuyenmuc)) <= 0){
				$data['error'] = "Chuyên mục không hợp lê!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			if(!is_numeric($giagoc) || ($giagoc <= 0)){
				$data['error'] = "Giá gốc phải là kiểu số và lớn hơn 0!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			if(!is_numeric($giaban) || ($giaban <= 0)){
				$data['error'] = "Giá bán phải là kiểu số và lớn hơn 0!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			if(($loaisanpham != 1) && ($loaisanpham != 2) &&  ($loaisanpham != 3) &&  ($loaisanpham != 4)){
				$data['error'] = "Loại sản phẩm không hợp lệ!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$img = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh chính!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}


			$hinhanh = "";

			if (!empty($_FILES['hinhanh']['name'][0])) {
				$filesCount = count($_FILES['hinhanh']['name']);
        
		        // Loop qua từng file để upload
		        for ($i = 0; $i < $filesCount; $i++) {
		            $_FILES['userfile']['name']     = $_FILES['hinhanh']['name'][$i];
		            $_FILES['userfile']['type']     = $_FILES['hinhanh']['type'][$i];
		            $_FILES['userfile']['tmp_name'] = $_FILES['hinhanh']['tmp_name'][$i];
		            $_FILES['userfile']['error']    = $_FILES['hinhanh']['error'][$i];
		            $_FILES['userfile']['size']     = $_FILES['hinhanh']['size'][$i];

		            // Thực hiện upload
		            if ($this->upload->do_upload()) {
		                $img = $this->upload->data();
		                $hinhanh .= base_url('uploads')."/".$img['file_name']."#";
		            } 
		        }
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}


			if($hinhanh == ""){
				$data['error'] = "Vui lòng chọn hình ảnh!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			$hinhanh = rtrim($hinhanh, '#');

			$this->Model_SanPham->add($tensanpham,$duongdan,$giagoc,$giaban,$loaisanpham,$anhchinh,$hinhanh,$motangan,$motadai,$machuyenmuc,$the);

			$this->session->set_flashdata('success', 'Thêm sản phẩm thành công!');
			return redirect(base_url('admin/san-pham/'));
		}
		return $this->load->view('Admin/View_ThemSanPham', $data);
	}

	public function update($masanpham)
	{
		if(count($this->Model_SanPham->getById($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'Sản phẩm không tồn tại!');
			return redirect(base_url('admin/san-pham/'));
		}

		$data['title'] = "Cập nhật sản phẩm";
		$data['detail'] = $this->Model_SanPham->getById($masanpham);
		$data['category'] = $this->Model_ChuyenMuc->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tensanpham = $this->input->post('tensanpham');
			$duongdan = $this->input->post('duongdan');
			$machuyenmuc = $this->input->post('machuyenmuc');
			$giagoc = $this->input->post('giagoc');
			$giaban = $this->input->post('giaban');
			$loaisanpham = $this->input->post('loaisanpham');
			$motadai = $this->input->post('motadai');
			$motangan = $this->input->post('motangan');
			$the = $this->input->post('the');
			$anhchinh = $this->Model_SanPham->getById($masanpham)[0]['AnhChinh'];
			$hinhanh = $this->Model_SanPham->getById($masanpham)[0]['HinhAnh'];

			if(empty($tensanpham) || empty($duongdan) || empty($giagoc) || empty($giaban) || empty($the) || empty($motangan) || empty($motadai)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}

			if(count($this->Model_ChuyenMuc->getById($machuyenmuc)) <= 0){
				$data['error'] = "Chuyên mục không hợp lê!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}

			if(!is_numeric($giagoc) || ($giagoc <= 0)){
				$data['error'] = "Giá gốc phải là kiểu số và lớn hơn 0!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}

			if(!is_numeric($giaban) || ($giaban <= 0)){
				$data['error'] = "Giá bán phải là kiểu số và lớn hơn 0!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}

			if(($loaisanpham != 1) && ($loaisanpham != 2) &&  ($loaisanpham != 3) &&  ($loaisanpham != 4)){
				$data['error'] = "Loại sản phẩm không hợp lệ!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$img = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$img['file_name'];
			}

			if (!empty($_FILES['hinhanh']['name'][0])) {
				$hinhanh = "";
				$filesCount = count($_FILES['hinhanh']['name']);
        
		        // Loop qua từng file để upload
		        for ($i = 0; $i < $filesCount; $i++) {
		            $_FILES['userfile']['name']     = $_FILES['hinhanh']['name'][$i];
		            $_FILES['userfile']['type']     = $_FILES['hinhanh']['type'][$i];
		            $_FILES['userfile']['tmp_name'] = $_FILES['hinhanh']['tmp_name'][$i];
		            $_FILES['userfile']['error']    = $_FILES['hinhanh']['error'][$i];
		            $_FILES['userfile']['size']     = $_FILES['hinhanh']['size'][$i];

		            // Thực hiện upload
		            if ($this->upload->do_upload()) {
		                $img = $this->upload->data();
		                $hinhanh .= base_url('uploads')."/".$img['file_name']."#";
		            } 
		        }

		        $hinhanh = rtrim($hinhanh, '#');
			}

			$this->Model_SanPham->update($tensanpham,$duongdan,$giagoc,$giaban,$loaisanpham,$anhchinh,$hinhanh,$motangan,$motadai,$machuyenmuc,$the,$masanpham);
			$data['success'] = "Cập nhật sản phẩm thành công!";
			$data['detail'] = $this->Model_SanPham->getById($masanpham);
			return $this->load->view('Admin/View_SuaSanPham', $data);
		}

		return $this->load->view('Admin/View_SuaSanPham', $data);
	}



	public function delete($masanpham)
	{
		if(count($this->Model_SanPham->getById($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'Sản phẩm không tồn tại!');
			return redirect(base_url('admin/san-pham/'));
		}
		$this->Model_SanPham->delete($masanpham);

		$this->session->set_flashdata('success', 'Xóa sản phẩm thành công!');
		return redirect(base_url('admin/san-pham/'));
	}

	public function import($masanpham){
		if(count($this->Model_SanPham->getById($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'Sản phẩm không tồn tại!');
			return redirect(base_url('admin/san-pham/'));
		}

		$data['title'] = "Nhập số lượng sản phẩm";
		$data['detail'] = $this->Model_SanPham->getById($masanpham);
		$data['category'] = $this->Model_ChuyenMuc->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$soluongnhap = $this->input->post('soluongnhap');

			if(empty($soluongnhap)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_NhapSanPham', $data);
			}

			if(!is_numeric($soluongnhap) || ($soluongnhap <= 0)){
				$data['error'] = "Số lượng nhập phải là kiểu số và lớn hơn 0!";
				return $this->load->view('Admin/View_NhapSanPham', $data);
			}

			$soluongcu = $this->Model_SanPham->getById($masanpham)[0]['SoLuong'];

			$soluongmoi = $soluongcu + $soluongnhap;

			$this->Model_SanPham->import($soluongmoi,$masanpham);

			$this->Model_SanPham->history($masanpham,$this->session->userdata('manhanvien'),$soluongcu,$soluongmoi);

			$data['success'] = "Nhập thêm số lượng sản phẩm thành công!";
			return $this->load->view('Admin/View_NhapSanPham', $data);
		}

		return $this->load->view('Admin/View_NhapSanPham', $data);
	}

	public function history($masanpham){
		if(count($this->Model_SanPham->getById($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'Sản phẩm không tồn tại!');
			return redirect(base_url('admin/san-pham/'));
		}

		if(count($this->Model_SanPham->getHistory($masanpham)) <= 0){
			$this->session->set_flashdata('error', 'Sản phẩm chưa có lịch sử nhập!');
			return redirect(base_url('admin/san-pham/'));
		}

		$data['title'] = "Lịch sử nhập sản phẩm";
		$data['list'] = $this->Model_SanPham->getHistory($masanpham);

		return $this->load->view('Admin/View_LichSuNhapSanPham', $data);
	}
}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */