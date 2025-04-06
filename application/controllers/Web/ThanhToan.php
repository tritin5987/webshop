<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ThanhToan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('cart')){
			return redirect(base_url('gio-hang/'));
		}

		if(!$this->session->userdata('khachhang')){
			$newdata = array(
				'thanhtoan' => TRUE
			);
			$this->session->set_userdata($newdata);
			$this->session->set_flashdata('redirect', 'Vui lòng đăng nhập để thanh toán!');
			return redirect(base_url('dang-nhap/'));
		}

		$array_items = array('thanhtoan');
        $this->session->unset_userdata($array_items);

        $this->load->model('Web/Model_HoaDon');
        $this->load->model('Web/Model_CauHinh');
        $this->load->model('Web/Model_SanPham');
	}

	public function index()
	{
		$data['title'] = "Thanh toán";
		$cart = $this->session->userdata('cart');
		$noidung = array(
			'noidung' => implode('', array_map(fn($i) => $i === 0 ? rand(1, 9) : rand(0, 9), range(0, 9)))
		);
		
		$this->session->set_userdata($noidung);
        $data['list'] = $cart;
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
        	$config = $this->Model_CauHinh->getAll();
        	$makhachhang = $this->session->userdata('makhachhang');
        	$diachi = $this->input->post('diachi').", ".$this->input->post('tinhhuyenxa');

        	$soluong = 0;
        	$tongtien = 0;
        	$thanhtoan = $this->input->post('thanhtoan');

        	if(($thanhtoan != 0) && ($thanhtoan != 2)){
        		return redirect(base_url('thanh-toan/'));
        	}

        	foreach($cart as $key => $value){
        		$tongtien += $value['number'] * $value['price'];
        		$soluong += $value['number'];
        	}

        	if($tongtien < $config[0]['MienPhiShip']){
        		$tongtien += $config[0]['PhiShip'];
        	}

        	if($this->session->has_userdata('saleCode')){
        		$tongtien -= $this->session->userdata('saleCode');
        	}
        	
        	$mahoadon = 0;
        	if($this->session->has_userdata('idSaleCode')){
        		$magiamgia = $this->session->userdata('idSaleCode');
        		$mahoadon = $this->Model_HoaDon->addWithSale($makhachhang,$tongtien,$thanhtoan,$magiamgia,$soluong,$diachi);
        	}else{
        		$mahoadon = $this->Model_HoaDon->addWithoutSale($makhachhang,$tongtien,$thanhtoan,$soluong,$diachi);
        	}
        	
        	foreach($cart as $key => $value){
        		$this->Model_HoaDon->addDetail($mahoadon,$value['id'],$value['number']);

        		$soluongmoi = $this->Model_SanPham->getById($value['id'])[0]['SoLuong'] - $value['number'];

        		$this->Model_SanPham->updateNumber($value['id'],$soluongmoi);
        	}
        	if (isset($_SESSION['saleCode'])) {
                unset($_SESSION['saleCode']);
            }

            if (isset($_SESSION['idSaleCode'])) {
                unset($_SESSION['idSaleCode']);
            }

            unset($_SESSION['cart']);
            unset($_SESSION['sumCart']);
            unset($_SESSION['numberCart']);
        	
        	$data['madonhang'] = $mahoadon;
        	return $this->load->view('Web/View_ThanhToanThanhCong', $data);
        }
		return $this->load->view('Web/View_ThanhToan', $data);
	}

	public function checkPay(){
		$cart = $this->session->userdata('cart');
		$config = $this->Model_CauHinh->getAll();
    	$makhachhang = $this->session->userdata('makhachhang');
    	$diachi = $this->input->post('diachi').", ".$this->input->post('tinhhuyenxa');

		$dathanhtoan = 0;
        try {
			$sotaikhoan = $config[0]['SoTaiKhoan'];
			$apikey = $config[0]['ApiKey'];
			$this->syncBank($apikey,$sotaikhoan);
			foreach ($this->historyBank($apikey) as $item) {
		        if (strpos($item['description'], $this->session->userdata('noidung')) !== false){
		            if($item['amount'] < $this->session->userdata('sumCart')){
		            	echo "Số tiền chuyển nhỏ hơn giá trị thanh toán!";
		            	return;
		            }else{
		            	$dathanhtoan = 1;
		            }
		            break;
		        }
		    }

		    if($dathanhtoan == 0){
		    	echo "waiting";
		        return;
		    }else{
		    	$config = $this->Model_CauHinh->getAll();
	        	$makhachhang = $this->session->userdata('makhachhang');
	        	$diachi = $this->input->post('diachi').", ".$this->input->post('tinhhuyenxa');

	        	$soluong = 0;
	        	$tongtien = 0;
	        	$thanhtoan = 2;

	        	foreach($cart as $key => $value){
	        		$tongtien += $value['number'] * $value['price'];
	        		$soluong += $value['number'];
	        	}

	        	if($tongtien < $config[0]['MienPhiShip']){
	        		$tongtien += $config[0]['PhiShip'];
	        	}

	        	if($this->session->has_userdata('saleCode')){
	        		$tongtien -= $this->session->userdata('saleCode');
	        	}
	        	
	        	$mahoadon = 0;
	        	if($this->session->has_userdata('idSaleCode')){
	        		$magiamgia = $this->session->userdata('idSaleCode');
	        		$mahoadon = $this->Model_HoaDon->addWithSale($makhachhang,$tongtien,$thanhtoan,$magiamgia,$soluong,$diachi);
	        	}else{
	        		$mahoadon = $this->Model_HoaDon->addWithoutSale($makhachhang,$tongtien,$thanhtoan,$soluong,$diachi);
	        	}
	        	
	        	foreach($cart as $key => $value){
	        		$this->Model_HoaDon->addDetail($mahoadon,$value['id'],$value['number']);

	        		$soluongmoi = $this->Model_SanPham->getById($value['id'])[0]['SoLuong'] - $value['number'];

	        		$this->Model_SanPham->updateNumber($value['id'],$soluongmoi);
	        	}
	        	if (isset($_SESSION['saleCode'])) {
	                unset($_SESSION['saleCode']);
	            }

	            if (isset($_SESSION['idSaleCode'])) {
	                unset($_SESSION['idSaleCode']);
	            }

	            unset($_SESSION['cart']);
	            unset($_SESSION['sumCart']);
	            unset($_SESSION['numberCart']);
		    	echo $mahoadon;
		    	return;
		    }
		}catch(Exception $e) {
		  	echo "Thanh toán chuyển khoản đang có lỗi, vui lòng chọn thanh toán tiền mặt!";
		    return;
		}
	}

	private function syncBank($apikey,$sotaikhoan){
		$curl = curl_init();
	    $data = array(
	    	'bank_acc_id' => $sotaikhoan,
	    );
	    $postdata = json_encode($data);

	    curl_setopt_array($curl, array(
	        CURLOPT_URL => "https://oauth.casso.vn/v2/sync",
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_TIMEOUT => 30,
	        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	        CURLOPT_CUSTOMREQUEST => "POST",
	        CURLOPT_POSTFIELDS => $postdata,
	        CURLOPT_HTTPHEADER => array(
	            "Authorization: Apikey ".$apikey,
	            "Content-Type: application/json"
	        ),
	    ));

	    $response = curl_exec($curl);
	    $err = curl_error($curl);

	    curl_close($curl);
	}

	private function historyBank($apikey){
		$curl = curl_init();

	    curl_setopt_array($curl, array(
	      CURLOPT_URL => "https://oauth.casso.vn/v2/transactions?fromDate=2024-04-01&page=1&pageSize=20&sort=DESC",
	      CURLOPT_RETURNTRANSFER => true,
	      CURLOPT_TIMEOUT => 30,
	      CURLOPT_CUSTOMREQUEST => "GET",
	      CURLOPT_HTTPHEADER => array(
	        "Authorization: Apikey ".$apikey,
	        "Content-Type: application/json"
	      ),
	    ));
	    
	    $response = curl_exec($curl);
	    $err = curl_error($curl);
	    
	    $response = json_decode($response, true);

	    curl_close($curl);

	    return $response['data']['records'];
	}

}

/* End of file ThanhToan.php */
/* Location: ./application/controllers/ThanhToan.php */