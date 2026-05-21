<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangNhap extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('khachhang')){
			return redirect(base_url('khach-hang/'));
		}

		$this->load->model('Web/Model_DangNhap');
		$this->load->model('Web/Model_KhachHang');
	}

	public function index()
	{
		$data['title'] = "Đăng nhập";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$taikhoan = $this->input->post('taikhoan');
			$matkhau = $this->input->post('matkhau');

			if($taikhoan == "" || $matkhau == ""){
				$data["error"] = "Tài khoản hoặc mật khẩu không được trống!";
				return $this->load->view('Web/View_DangNhap', $data);
			}


			if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $taikhoan)) {
			    $data["error"] = "Tài khoản không hợp lệ!";
				return $this->load->view('Web/View_DangNhap', $data);
			} 

			if($this->Model_DangNhap->checkAccount($taikhoan, md5($matkhau)) >= 1){
				if($this->Model_DangNhap->checkAccountBlock($taikhoan) >= 1){
					$data["error"] = "Tài khoản đã bị cấm khỏi hệ thống!";
					return $this->load->view('Web/View_DangNhap', $data);
				}else{
					$newdata = array(
						'makhachhang' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['MaKhachHang'],
					    'khachhang'  => $taikhoan,
					    'hoten' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['HoTen'],
					    'sodienthoai' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['SoDienThoai'],
					    'email' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['Email'],
					    'diachi' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['DiaChi']
					);
					$this->session->set_userdata($newdata);

					// Sinh session token cho chatbot và dọn dẹp các phiên cũ hơn 10
					$chat_token = uniqid('chat_', true);
					$this->session->set_userdata('chat_session_token', $chat_token);
					$this->cleanOldChatSessions($newdata['makhachhang']);

					if($this->session->has_userdata('lienhe')){
			            return redirect(base_url('lien-he/'));
			        }

			        if($this->session->has_userdata('thanhtoan')){
			            return redirect(base_url('thanh-toan/'));
			        }
					
					return redirect(base_url('khach-hang/'));
				}
				
			}else{
				$data["error"] = "Tài khoản hoặc mật khẩu không đúng";
				return $this->load->view('Web/View_DangNhap', $data);
			}
		}
		return $this->load->view('Web/View_DangNhap', $data);
	}

	public function register(){
		$data['title'] = "Đăng ký";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$hoten = $this->input->post('hoten');
			$sodienthoai = $this->input->post('sodienthoai');
			$email = $this->input->post('email');
			$diachi = $this->input->post('diachi');
			$taikhoan = $this->input->post('taikhoan');
			$matkhau = $this->input->post('matkhau');

			if($taikhoan == "" || $matkhau == "" || $sodienthoai == "" || $hoten == "" || $email == "" || $diachi == ""){
				$data["error"] = "Vui lòng nhập đủ thông tin khách hàng!";
				return $this->load->view('Web/View_DangKy', $data);
			}

			if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $taikhoan)) {
			    $data["error"] = "Tài khoản không hợp lệ!";
				return $this->load->view('Web/View_DangKy', $data);
			} 

			$pattern = '/^(0|\+84)[3|5|7|8|9]\d{8}$/';

			if (!preg_match($pattern, $sodienthoai)) {
			    $data['error'] = "Số điện thoại không hợp lệ!";
				return $this->load->view('Web/View_DangKy', $data);
			}

			if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
			    $data['error'] = "Email không hợp lệ!";
				return $this->load->view('Web/View_DangKy', $data);
			}

			if(count($this->Model_DangNhap->getInfoByUsername($taikhoan)) >= 1){
				$data['error'] = "Tài khoản đã tồn tại trong hệ thống!";
				return $this->load->view('Web/View_DangKy', $data);
			}

			if(count($this->Model_DangNhap->getInfoByPhone($sodienthoai)) >= 1){
				$data['error'] = "Số điện thoại đã tồn tại trong hệ thống!";
				return $this->load->view('Web/View_DangKy', $data);
			}

			if(count($this->Model_DangNhap->getInfoByEmail($email)) >= 1){
				$data['error'] = "Email đã tồn tại trong hệ thống!";
				return $this->load->view('Web/View_DangKy', $data);
			}

			$this->Model_KhachHang->insert($hoten,$taikhoan,md5($matkhau),$sodienthoai,$email,$diachi);

			$newdata = array(
				'makhachhang' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['MaKhachHang'],
			    'khachhang'  => $taikhoan,
			    'hoten' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['HoTen'],
			    'sodienthoai' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['SoDienThoai'],
			    'email' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['Email'],
			    'diachi' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['DiaChi']
			);
			$this->session->set_userdata($newdata);

			// Sinh session token cho chatbot và dọn dẹp các phiên cũ hơn 10
			$chat_token = uniqid('chat_', true);
			$this->session->set_userdata('chat_session_token', $chat_token);
			$this->cleanOldChatSessions($newdata['makhachhang']);

			return redirect(base_url('khach-hang/'));
		}
		return $this->load->view('Web/View_DangKy', $data);
	}

	private function cleanOldChatSessions($makhachhang) {
		// Tìm các session_token của makhachhang này, sắp xếp theo thời gian mới nhất
		$sql = "SELECT DISTINCT session_token, MIN(created_at) as earliest_msg 
				FROM lichsu_chatbot 
				WHERE makhachhang = ? 
				GROUP BY session_token 
				ORDER BY earliest_msg DESC";
		$query = $this->db->query($sql, array($makhachhang));
		$sessions = $query->result_array();

		// Nếu số lượng session nhiều hơn 10, tìm những session cũ vượt quá giới hạn và xóa
		if (count($sessions) > 10) {
			$sessions_to_keep = array_slice($sessions, 0, 10);
			$tokens_to_keep = array_column($sessions_to_keep, 'session_token');
			
			// Xóa tất cả tin nhắn của các session không nằm trong danh sách 10 session mới nhất
			$this->db->where('makhachhang', $makhachhang);
			$this->db->where_not_in('session_token', $tokens_to_keep);
			$this->db->delete('lichsu_chatbot');
		}
	}

}

/* End of file DangNhap.php */
/* Location: ./application/controllers/DangNhap.php */