<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CauHinh extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_CauHinh');
	}

	public function index()
	{
		$data['title'] = "Cấu hình hệ thống";
		$data['detail'] = $this->Model_CauHinh->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenwebsite = $this->input->post('tenwebsite');
			$motaweb = $this->input->post('motaweb');
			$diachi = $this->input->post('diachi');
			$email = $this->input->post('email');
			$sodienthoai = $this->input->post('sodienthoai');
			$phiship = $this->input->post('phiship');
			$mienphiship = $this->input->post('mienphiship');
			$logo = $this->Model_CauHinh->getAll()[0]['Logo'];
			$qrnganhang = $this->Model_CauHinh->getAll()[0]['QRNganHang'];
			$chutaikhoan = $this->input->post('chutaikhoan');
			$sotaikhoan = $this->input->post('sotaikhoan');
			$apikey = $this->input->post('apikey');
			$nganhang = $this->input->post('nganhang');

			if(empty($tenwebsite) || empty($motaweb) || empty($diachi) || empty($email) || empty($sodienthoai) || empty($phiship) || empty($mienphiship)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_CauHinh', $data);
			}

			if(empty($chutaikhoan) || empty($sotaikhoan) || empty($apikey)){
				$data['error'] = "Vui lòng nhập đủ thông tin ngân hàng và Api thanh toán!";
				return $this->load->view('Admin/View_CauHinh', $data);
			}

			$pattern = '/^(0|\+84)[3|5|7|8|9]\d{8}$/';

			if (!preg_match($pattern, $sodienthoai)) {
			    $data['error'] = "Vui lòng nhập số điện thoại hợp lệ!";
				return $this->load->view('Admin/View_CauHinh', $data);
			}


			if(!is_numeric($phiship) || $phiship <= 0){
				$data['error'] = "Vui lòng nhập phí giao hàng hợp lệ!";
				return $this->load->view('Admin/View_CauHinh', $data);
			}

			if(!is_numeric($mienphiship) || $mienphiship <= 0){
				$data['error'] = "Vui lòng nhập giá trị miễn phí giao hàng hợp lệ!";
				return $this->load->view('Admin/View_CauHinh', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('logo')){
				$img = $this->upload->data();
				$logo = base_url('uploads')."/".$img['file_name'];
			}

			if ($this->upload->do_upload('qrnganhang')){
				$img = $this->upload->data();
				$qrnganhang = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_CauHinh->update($tenwebsite,$motaweb,$logo,$diachi,$email,$sodienthoai,$phiship,$mienphiship,$qrnganhang,$chutaikhoan,$sotaikhoan,$apikey,$nganhang);
			$data['success'] = "Lưu cấu hình thành công!";
			$data['detail'] = $this->Model_CauHinh->getAll();
			return $this->load->view('Admin/View_CauHinh', $data);
		}
		return $this->load->view('Admin/View_CauHinh', $data);
	}

}

/* End of file CauHinh.php */
/* Location: ./application/controllers/CauHinh.php */