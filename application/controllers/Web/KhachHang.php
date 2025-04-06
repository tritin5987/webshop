<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KhachHang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('khachhang')){
			return redirect(base_url('dang-nhap/'));
		}
		$this->load->model('Web/Model_KhachHang');
		$this->load->model('Web/Model_DangNhap');
	}

	public function index()
	{
		$data['title'] = "Khách hàng";
		$data['list'] = $this->Model_KhachHang->getOrderById($this->session->userdata('makhachhang'));
		return $this->load->view('Web/View_KhachHang', $data);
	}


	public function update(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$taikhoan = $this->session->userdata('khachhang');
			$hoten  = $this->input->post('hoten');
			$sodienthoai  = $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['SoDienThoai'];
			$email  = $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['Email'];
			$diachi  = $this->input->post('diachi');
			$matkhau = $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['MatKhau'];
			$makhachhang = $this->session->userdata('makhachhang');


			if(empty($hoten) || empty($sodienthoai) || empty($email) || empty($diachi)){
				echo "Vui lòng nhập đủ thông tin!";
				return;
			}	

			$pattern = '/^(0|\+84)[3|5|7|8|9]\d{8}$/';

			if (!preg_match($pattern, $sodienthoai)) {
			    echo "Số điện thoại không hợp lệ!";
				return;
			}

			if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
			    echo "Email không hợp lệ!";
				return;
			}

			if($_POST['sodienthoai'] != $sodienthoai){
				if(count($this->Model_DangNhap->getInfoByPhone($_POST['sodienthoai'])) >= 1){
					echo "Số điện thoại đã tồn tại trong hệ thống!";
					return;
				}
			}

			if($_POST['email'] != $email){
				if(count($this->Model_DangNhap->getInfoByEmail($_POST['email'])) >= 1){
					echo "Email đã tồn tại trong hệ thống!";
					return;
				}
			}

			if(isset($_POST['matkhaumoi']) && !empty($_POST['matkhaumoi'])){
				if(md5($_POST['matkhauhientai']) != $matkhau){
					echo "Mật khẩu hiện tại không đúng!";
					return;
				}

				if($_POST['matkhaumoi'] != $_POST['xacnhanmatkhau']){
					echo "Mật khẩu xác nhận không khớp!";
					return;
				}

				if(($_POST['matkhaumoi'] == $_POST['xacnhanmatkhau']) && (md5($_POST['matkhauhientai']) == $matkhau)){
					$matkhau = md5($_POST['matkhaumoi']);
				}
			}

			$this->Model_KhachHang->update($hoten,$matkhau,$sodienthoai,$email,$diachi,$makhachhang);

			$newdata = array(
				'makhachhang' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['MaKhachHang'],
			    'khachhang'  => $taikhoan,
			    'hoten' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['HoTen'],
			    'sodienthoai' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['SoDienThoai'],
			    'email' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['Email'],
			    'diachi' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['DiaChi']
			);
			$this->session->set_userdata($newdata);

			echo "Cập nhật thông tin thành công!";
		}
	}

	public function order($madonhang){

		if(count($this->Model_KhachHang->getOrderDetailById($madonhang)) <= 0){
			$data['title'] = "Không tìm thấy đơn hàng!";
			return $this->load->view('Web/404', $data);
		}


		if($this->Model_KhachHang->getById($madonhang)[0]['MaKhachHang'] != $this->session->userdata('makhachhang')){
			return redirect(base_url('khach-hang/'));
		}

		$data['title'] = "Chi tiết đơn hàng";
		$data['list'] = $this->Model_KhachHang->getOrderDetailById($madonhang);
		$data['detail'] = $this->Model_KhachHang->getById($madonhang);
		return $this->load->view('Web/View_ChiTietDonHang', $data);
	}

	public function cancel($madonhang){
		if(count($this->Model_KhachHang->getOrderDetailById($madonhang)) <= 0){
			return redirect(base_url('khach-hang/'));
		}

		if($this->Model_KhachHang->getById($madonhang)[0]['MaKhachHang'] != $this->session->userdata('makhachhang')){
			return redirect(base_url('khach-hang/'));
		}

		$detail = $this->Model_KhachHang->getById($madonhang);

		if(($detail[0]['TrangThai'] != 3) && ($detail[0]['TrangThai'] != 4) && ($detail[0]['TrangThai'] != 0)){
			$this->Model_KhachHang->cancel($madonhang);
			return redirect(base_url('khach-hang/don-hang/'.$madonhang.'/xem/'));
		}

		return redirect(base_url('khach-hang/don-hang/'.$madonhang.'/xem/'));
	}
}

/* End of file KhachHang.php */
/* Location: ./application/controllers/KhachHang.php */