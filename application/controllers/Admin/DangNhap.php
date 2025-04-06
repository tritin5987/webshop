<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangNhap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/'));
		}
		$data = array();
		$this->load->model('Admin/Model_DangNhap');
	}

	public function index()
	{	
		$data['title'] = "Đăng nhập tài khoản quản trị";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $taikhoan = $this->input->post('taikhoan');
			$matkhau = $this->input->post('matkhau');

			if($taikhoan == "" || $matkhau == ""){
				$data["error"] = "Tài khoản hoặc mật khẩu không được trống";
				return $this->load->view('Admin/View_DangNhap', $data);
			}


			if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $taikhoan)) {
			    $data["error"] = "Tài khoản không hợp lệ!";
				return $this->load->view('Admin/View_DangNhap', $data);
			} 

			if($this->Model_DangNhap->checkAccountAdmin($taikhoan, md5($matkhau)) >= 1){
				$newdata = array(
					'manhanvien' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['MaNhanVien'],
				    'taikhoan'  => $taikhoan,
				    'login' => True,
				    'hoten' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['HoTen'],
				    'phanquyen' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['PhanQuyen'],
				);
				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('success', 'Đăng nhập thành công');
				return redirect(base_url('admin/'));
			}else{
				$data["error"] = "Tài khoản hoặc mật khẩu không đúng";
				return $this->load->view('Admin/View_DangNhap', $data);
			}

        }

		return $this->load->view('Admin/View_DangNhap',$data);
	}

}

/* End of file DangNhap.php */
/* Location: ./application/controllers/DangNhap.php */