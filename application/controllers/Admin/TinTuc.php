<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TinTuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_TinTuc');
	}

	public function index()
	{
		$search = $this->input->get('search');

		if(!empty($search)){
			$totalRecords = $this->Model_TinTuc->checkNumberSearch($search);
			$recordsPerPage = 10;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAllSearch($search);
			$data['title'] = "Tin tức cửa hàng";
			return $this->load->view('Admin/View_TinTuc', $data);
		}

		$totalRecords = $this->Model_TinTuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_TinTuc->getAll();
		$data['title'] = "Tin tức cửa hàng";
		return $this->load->view('Admin/View_TinTuc', $data);
	}

	public function page($trang){
		$data['title'] = "Tin tức cửa hàng";
		$totalRecords = $this->Model_TinTuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/tin-tuc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/tin-tuc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAll();
			return $this->load->view('Admin/View_TinTuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAll($start);
			return $this->load->view('Admin/View_TinTuc', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm tin tức cửa hàng";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tieude = $this->input->post('tieude');
			$noidung = $this->input->post('noidung');
			$duongdan = $this->input->post('duongdan');
			$manhanvien = $this->session->userdata('manhanvien');
			$the = $this->input->post('the');

			$hinhanh = "";

			if(empty($tieude) || empty($duongdan) || empty($noidung) || empty($the)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemTinTuc', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh!";
				return $this->load->view('Admin/View_ThemTinTuc', $data);
			}

			$this->Model_TinTuc->add($tieude,$noidung,$duongdan,$the,$manhanvien,$hinhanh);

			$this->session->set_flashdata('success', 'Thêm tin tức thành công!');
			return redirect(base_url('admin/tin-tuc/'));
		}
		return $this->load->view('Admin/View_ThemTinTuc', $data);
	}

	public function update($matintuc)
	{
		if(count($this->Model_TinTuc->getById($matintuc)) <= 0){
			$this->session->set_flashdata('error', 'Tin tức không tồn tại!');
			return redirect(base_url('admin/tin-tuc/'));
		}

		$data['title'] = "Cập nhật tin tức cửa hàng";
		$data['detail'] = $this->Model_TinTuc->getById($matintuc);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tieude = $this->input->post('tieude');
			$noidung = $this->input->post('noidung');
			$duongdan = $this->input->post('duongdan');
			$manhanvien = $this->session->userdata('manhanvien');
			$the = $this->input->post('the');
			$hinhanh = $this->Model_TinTuc->getById($matintuc)[0]['HinhAnh'];

			if(empty($tieude) || empty($duongdan) || empty($noidung) || empty($the)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemTinTuc', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_TinTuc->update($tieude,$noidung,$duongdan,$the,$manhanvien,$hinhanh,$matintuc);
			$data['success'] = "Cập nhật tin tức thành công!";
			$data['detail'] = $this->Model_TinTuc->getById($matintuc);
			return $this->load->view('Admin/View_SuaTinTuc', $data);
		}

		return $this->load->view('Admin/View_SuaTinTuc', $data);
	}



	public function delete($matintuc)
	{
		if(count($this->Model_TinTuc->getById($matintuc)) <= 0){
			$this->session->set_flashdata('error', 'Tin tức không tồn tại!');
			return redirect(base_url('admin/tin-tuc/'));
		}
		$this->Model_TinTuc->delete($matintuc);

		$this->session->set_flashdata('success', 'Xóa tin tức thành công!');
		return redirect(base_url('admin/tin-tuc/'));
	}
}

/* End of file TinTuc.php */
/* Location: ./application/controllers/TinTuc.php */