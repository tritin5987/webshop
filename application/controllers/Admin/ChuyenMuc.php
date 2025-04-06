<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChuyenMuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_ChuyenMuc');
	}

	public function index()
	{
		$search = $this->input->get('search');

		if(!empty($search)){
			$totalRecords = $this->Model_ChuyenMuc->checkNumberSearch($search);
			$recordsPerPage = 10;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllSearch($search);
			$data['title'] = "Chuyên mục sản phẩm";
			return $this->load->view('Admin/View_ChuyenMuc', $data);
		}

		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ChuyenMuc->getAll();
		$data['title'] = "Chuyên mục sản phẩm";
		return $this->load->view('Admin/View_ChuyenMuc', $data);
	}

	public function page($trang){
		$data['title'] = "Chuyên mục sản phẩm";
		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAll();
			return $this->load->view('Admin/View_ChuyenMuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAll($start);
			return $this->load->view('Admin/View_ChuyenMuc', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm chuyên mục sản phẩm";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenchuyenmuc = $this->input->post('tenchuyenmuc');
			$duongdan = $this->input->post('duongdan');
			$hinhanh = "";

			if(empty($tenchuyenmuc) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			$this->Model_ChuyenMuc->add($tenchuyenmuc,$duongdan,$hinhanh);

			$this->session->set_flashdata('success', 'Thêm chuyên mục thành công!');
			return redirect(base_url('admin/chuyen-muc/'));
		}
		return $this->load->view('Admin/View_ThemChuyenMuc', $data);
	}

	public function update($machuyenmuc)
	{
		if(count($this->Model_ChuyenMuc->getById($machuyenmuc)) <= 0){
			$this->session->set_flashdata('error', 'Chuyên mục không tồn tại!');
			return redirect(base_url('admin/chuyen-muc/'));
		}

		$data['title'] = "Cập nhật chuyên mục sản phẩm";
		$data['detail'] = $this->Model_ChuyenMuc->getById($machuyenmuc);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenchuyenmuc = $this->input->post('tenchuyenmuc');
			$duongdan = $this->input->post('duongdan');
			$hinhanh = $this->Model_ChuyenMuc->getById($machuyenmuc)[0]['HinhAnh'];

			if(empty($tenchuyenmuc) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_ChuyenMuc->update($tenchuyenmuc,$duongdan,$hinhanh,$machuyenmuc);
			$data['success'] = "Cập nhật chuyên mục thành công!";
			$data['detail'] = $this->Model_ChuyenMuc->getById($machuyenmuc);
			return $this->load->view('Admin/View_SuaChuyenMuc', $data);
		}

		return $this->load->view('Admin/View_SuaChuyenMuc', $data);
	}



	public function delete($machuyenmuc)
	{
		if(count($this->Model_ChuyenMuc->getById($machuyenmuc)) <= 0){
			$this->session->set_flashdata('error', 'Chuyên mục không tồn tại!');
			return redirect(base_url('admin/chuyen-muc/'));
		}
		$this->Model_ChuyenMuc->delete($machuyenmuc);

		$this->session->set_flashdata('success', 'Xóa chuyên mục thành công!');
		return redirect(base_url('admin/chuyen-muc/'));
	}
}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */