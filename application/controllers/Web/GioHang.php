<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GioHang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_SanPham');
        $this->load->model('Web/Model_MaGiamGia');
	}

	public function index()
	{
        $data['title'] = "Giỏ hàng";
        $cart = $this->session->userdata('cart');
        $data['list'] = $cart;
		return $this->load->view('Web/View_GioHang', $data);
	}

	public function add($product_id, $quantity) {
        $cart = $this->session->userdata('cart');
        
        if (!$cart) {
            $cart = array();
        }

        if(empty($quantity) || $quantity <= 0){
        	return;
        }
        
        if(count($this->Model_SanPham->getById($product_id)) == 0){
        	return;
        }

        if($quantity > $this->Model_SanPham->getById($product_id)[0]['SoLuong']){
            return;
        }

        if(isset($cart[$product_id]['number'])){
            if(($cart[$product_id]['number'] + $quantity) > $this->Model_SanPham->getById($product_id)[0]['SoLuong']){
                return;
            }
        }
        

        $price = $this->Model_SanPham->getById($product_id)[0]['GiaBan'];
        $image = $this->Model_SanPham->getById($product_id)[0]['AnhChinh'];
        $name =  $this->Model_SanPham->getById($product_id)[0]['TenSanPham'];
        $slug = $this->Model_SanPham->getById($product_id)[0]['DuongDan'];
        if (isset($cart[$product_id])) {
            $cart[$product_id]['number'] += $quantity;
        } else {
            $cart[$product_id] = array(
                'id' => $product_id,
                'number' => $quantity,
                'price' => $price,
                'image' => $image,
                'name' => $name,
                'slug' => $slug, 
            );
        }

        $sumCart = 0;

        foreach ($cart as $key => $value) {
        	$sumCart += $value['price'] * $value['number'];
        }


        if(isset($_SESSION['saleCode'])){
            $saleCode = $this->session->userdata('saleCode');
            $sumCart = $sumCart - $saleCode;
        }

        $this->session->set_userdata('cart', $cart);
        $this->session->set_userdata('sumCart', $sumCart);
        $this->session->set_userdata('numberCart', count($cart));

        $data = array(
		    'sumCart' => number_format($sumCart),
		    'numberCart' => count($cart),
            'cart' => $cart
		);

		$json = json_encode($data);

		echo $json;
    }

    public function updateNumber($product_id, $number){
        if(count($this->Model_SanPham->getById($product_id)) == 0){
            return;
        }

        if(empty($number) || $number <= 0){
            return;
        }
        
        if($number > $this->Model_SanPham->getById($product_id)[0]['SoLuong']){
            return;
        }

        if(($cart[$product_id]['number'] + $number) > $this->Model_SanPham->getById($product_id)[0]['SoLuong']){
            return;
        }

        if($product_id == 0){
            $product_id = 1;
        }

        $cart = $this->session->userdata('cart');
        $cart[$product_id]['number'] = $number;
        $this->session->set_userdata('cart', $cart);

        $sumCart = 0;

        foreach ($cart as $key => $value) {
            $sumCart += $value['price'] * $value['number'];
        }

        if(isset($_SESSION['saleCode'])){
            $saleCode = $this->session->userdata('saleCode');
            $sumCart = $sumCart - $saleCode;
        }

        $this->session->set_userdata('sumCart', $sumCart);
    }

    public function delete($product_id) {
        if(count($this->Model_SanPham->getById($product_id)) == 0){
            return;
        }

        $cart = $this->session->userdata('cart');
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
        }
        $this->session->set_userdata('cart', $cart);

        $sumCart = 0;
        foreach ($cart as $key => $value) {
            $sumCart += $value['price'] * $value['number'];
        }

        if(isset($_SESSION['saleCode'])){
            $saleCode = $this->session->userdata('saleCode');
            $sumCart = $sumCart - $saleCode;
        }
        $this->session->set_userdata('sumCart', $sumCart);
        $this->session->set_userdata('numberCart', count($cart));

        if(count($cart) == 0){
            if (isset($_SESSION['saleCode'])) {
                unset($_SESSION['saleCode']);
            }

            if (isset($_SESSION['idSaleCode'])) {
                unset($_SESSION['idSaleCode']);
            }

            unset($_SESSION['cart']);
            unset($_SESSION['sumCart']);
            unset($_SESSION['numberCart']);
        }
    }

    public function code($magiamgia){
        $cart = $this->session->userdata('cart');

        $sumCart = 0;
        foreach ($cart as $key => $value) {
            $sumCart += $value['price'] * $value['number'];
        }

        if(count($this->Model_MaGiamGia->checkCode($magiamgia)) <= 0){
            echo "Mã Giảm Giá Không Đúng!";
            return;
        }

        $idmagiamgia = $this->Model_MaGiamGia->checkCode($magiamgia)[0]['MaGiamGia'];
        $solandung = $this->Model_MaGiamGia->checkCode($magiamgia)[0]['DaSuDung'];
        $soluong = $this->Model_MaGiamGia->checkCode($magiamgia)[0]['SoLuong'];
        $ngayhethan = $this->Model_MaGiamGia->checkCode($magiamgia)[0]['ThoiGian'];

        if($solandung >= $soluong){
            echo "Mã Giảm Giá Đã Hết Số Lần Sử Dụng!";
            return;
        }

        $currentDate = date("Y-m-d");
        if (strtotime($currentDate) > strtotime($ngayhethan)) {
            echo "Mã Giảm Giá Đã Hết Hạn Sử Dụng";
            return;
        }

        $trigia = $this->Model_MaGiamGia->checkCode($magiamgia)[0]['GiaTriGiam'];

        if($trigia >= $sumCart){
            echo "Mã Giảm Giá Không Được Có Giá Trị Lớn Hơn Tổng Đơn Hàng!";
            return;
        }

        $this->session->set_userdata('saleCode', $trigia);
        $this->session->set_userdata('idSaleCode', $idmagiamgia);

        if(isset($_SESSION['saleCode'])){
            $saleCode = $this->session->userdata('saleCode');
            $sumCart = $sumCart - $saleCode;
        }

        $this->session->set_userdata('sumCart', $sumCart);

        $solandung = $solandung + 1;

        $this->Model_MaGiamGia->updateCode($solandung,$magiamgia);

        echo TRUE;
    }

}

/* End of file GioHang.php */
/* Location: ./application/controllers/GioHang.php */