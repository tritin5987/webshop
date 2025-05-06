<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LienHe extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_LienHe');
		$array_items = array('lienhe');
        $this->session->unset_userdata($array_items);
	}

	public function index()
	{
		$data['title'] = "Liên hệ";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			if(!$this->session->has_userdata('khachhang')){
				$newdata = array(
					'lienhe' => TRUE
				);
				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('redirect', 'Vui lòng đăng nhập để gửi liên hệ!');
				return redirect(base_url('dang-nhap/'));
			}

			$makhachhang = $this->session->userdata('makhachhang');
			$tieude = $this->input->post('tieude');
			$noidung = $this->input->post('noidung');

			if($tieude == "" || $noidung == ""){
				$data['error'] = "Vui lòng nhập đủ thông tin liên hệ!";
				return $this->load->view('Web/View_LienHe', $data);
			}

			$this->Model_LienHe->insert($makhachhang,$tieude,$noidung);
			$data['success'] = "Cảm ơn bạn đã gửi liên hệ với chúng tôi!";
			return $this->load->view('Web/View_LienHe', $data);
		}
		return $this->load->view('Web/View_LienHe', $data);
	}

}

/* End of file LienHe.php */
/* Location: ./application/controllers/LienHe.php */