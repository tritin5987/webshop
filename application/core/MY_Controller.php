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

        //Logout customer is deactive
        if($this->session->has_userdata('khachhang')){
            if($this->Model_DangNhap->checkAccountBlock($this->session->userdata('khachhang')) >= 1){
                $array_items = array('makhachhang', 'khachhang', 'hoten', 'sodienthoai', 'email', 'diachi');
                $this->session->unset_userdata($array_items);
            }
        }
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */