<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CaNhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_NhanVien');
	}

	public function index()
	{
		$data['title'] = "Thông tin cá nhân";
		$data['detail'] = $this->Model_NhanVien->getById($this->session->userdata('manhanvien'));
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$hoten = $this->input->post('hoten');
			$email = $this->input->post('email');
			$sodienthoai = $this->input->post('sodienthoai');
			$taikhoan = $this->input->post('taikhoan');
			$matkhau = $this->Model_NhanVien->getById($this->session->userdata('manhanvien'))[0]['MatKhau'];

			if(empty($hoten) || empty($email) || empty($sodienthoai) || empty($taikhoan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_CaNhan', $data);
			}

			$pattern = '/^(0|\+84)[3|5|7|8|9]\d{8}$/';

			if (!preg_match($pattern, $sodienthoai)) {
			    $data['error'] = "Vui lòng nhập số điện thoại hợp lệ!";
				return $this->load->view('Admin/View_CaNhan', $data);
			}

			$pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

			if (!preg_match($pattern, $email)) {
			    $data['error'] = "Vui lòng nhập email hợp lệ!";
				return $this->load->view('Admin/View_CaNhan', $data);
			}

			if(isset($_POST['matkhau']) && !empty($_POST['matkhau'])){
				$matkhau = md5($this->input->post('matkhau'));
			}

			$this->Model_NhanVien->update($hoten,$taikhoan,$matkhau,$email,$sodienthoai,$this->session->userdata('manhanvien'));

			$data['success'] = "Lưu thông tin cá nhân thành công!";
			$data['detail'] = $this->Model_NhanVien->getById($this->session->userdata('manhanvien'));
			return $this->load->view('Admin/View_CaNhan', $data);
		}
		return $this->load->view('Admin/View_CaNhan', $data);
	}

}

/* End of file CaNhan.php */
/* Location: ./application/controllers/CaNhan.php */