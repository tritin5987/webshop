<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrangChu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$this->load->model('Admin/Model_TrangChu');
	}

	public function index()
	{
		$data['title'] = "Trang quản trị";
		$data['donHangMoi'] = count($this->Model_TrangChu->getDonHangMoi());
		$data['doanhThuNgay'] = $this->Model_TrangChu->getDoanhThuNgay()[0]['TongTienSum'];
		$data['khachHangMoi'] = count($this->Model_TrangChu->getKhachHangMoi());
		$data['tongSanPham'] = $this->Model_TrangChu->getSoLuongSanPham()[0]['TongSoLuong'];
		$data['tongChuyenMuc'] = $this->Model_TrangChu->getTongChuyenMuc()[0]['TongChuyenMuc'];
		$data['tongLoaiSanPham'] = $this->Model_TrangChu->getTongLoaiSanPham()[0]['TongSanPham'];
		$data['tongTongMaGiamGia'] = $this->Model_TrangChu->getTongMaGiamGia()[0]['TongMaGiamGia'];
		$data['tongKhachHang'] = $this->Model_TrangChu->getTongKhachHang()[0]['TongKhachHang'];
		$data['history'] = $this->Model_TrangChu->getHistory();
		$data['doanhThuThang'] = $this->Model_TrangChu->getSumRevenue(date('m'))[0]['TongTien'];
		$data['donHangThang'] = $this->Model_TrangChu->getSumOrder(date('m'))[0]['TongDon'];
		$data['banTrongThang'] = $this->Model_TrangChu->getSell(date('m'))[0]['SanPham'];
		$data['doanhThuTuan'] = $this->Model_TrangChu->getSumRevenueWeek()[0]['TongTien'];
		$data['donHangTuan'] = $this->Model_TrangChu->getSumOrderWeek()[0]['TongDon'];
		$data['banTrongTuan'] = $this->Model_TrangChu->getSellWeek()[0]['SanPham'];
		return $this->load->view('Admin/View_TrangChu', $data);
	}

	public function sumRevenue(){
		$data = array();

		for($i = 1; $i <= 12; $i++){
			$list = $this->Model_TrangChu->getSumRevenue($i);
			if(empty($list[0]['TongTien']) || !isset($list[0]['TongTien']) || $list[0]['TongTien'] == null){
				array_push($data,0);
			}else{
				array_push($data,(int)$list[0]['TongTien']);
			}
		}

		$data = json_encode($data);

		echo $data;
	}

	public function sumOrder(){
		$data = array();

		for($i = 1; $i <= 12; $i++){
			$list = $this->Model_TrangChu->getSumOrder($i);
			if(empty($list[0]['TongDon']) || !isset($list[0]['TongDon']) || $list[0]['TongDon'] == null){
				array_push($data,0);
			}else{
				array_push($data,(int)$list[0]['TongDon']);
			}
		}

		$data = json_encode($data);

		echo $data;
	}

}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */