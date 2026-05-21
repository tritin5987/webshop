<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Model_CauHinh');
        $this->load->model('Web/Model_ChuyenMuc');
        $this->load->model('Web/Model_DangNhap');
        $this->data['config'] = $this->Model_CauHinh->getAll();
        $this->data['category'] = $this->Model_ChuyenMuc->getAll();
        $this->load->vars($this->data);

        // Khởi tạo chat_session_token cho tất cả khách hàng (đảm bảo F5 không mất lịch sử)
        if (!$this->session->has_userdata('chat_session_token')) {
            $this->session->set_userdata('chat_session_token', uniqid('chat_', true));
        }

        //Logout customer is deactive
        if($this->session->has_userdata('khachhang')){
            if($this->Model_DangNhap->checkAccountBlock($this->session->userdata('khachhang')) >= 1){
                $array_items = array('makhachhang', 'khachhang', 'hoten', 'sodienthoai', 'email', 'diachi', 'chat_session_token');
                $this->session->unset_userdata($array_items);
            }
        }
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */