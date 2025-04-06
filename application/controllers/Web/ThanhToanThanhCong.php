<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ThanhToanThanhCong extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Thanh toán thành công";
		$data['madonhang'] = $_GET['madonhang'];
		return $this->load->view('Web/View_ThanhToanThanhCong', $data);
	}

}

/* End of file ThanhToanThanhCong.php */
/* Location: ./application/controllers/ThanhToanThanhCong.php */