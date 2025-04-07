<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NhanVien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata('taikhoan')){
            return redirect(base_url('admin/dang-nhap/'));
        }

        $this->load->model('Admin/Model_NhanVien');
    }

    public function index()
    {
        $search = $this->input->get('search');

        if(!empty($search)){
            $totalRecords = $this->Model_NhanVien->checkNumberSearch($search);
            $recordsPerPage = 10;
            $totalPages = ceil($totalRecords / $recordsPerPage);

            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_NhanVien->getAllSearch($search);
            $data['title'] = "Danh sách nhân viên";
            return $this->load->view('Admin/View_NhanVien', $data);
        }

        $totalRecords = $this->Model_NhanVien->checkNumber();
        $recordsPerPage = 10;
        $totalPages = ceil($totalRecords / $recordsPerPage);

        $data['totalPages'] = $totalPages;
        $data['list'] = $this->Model_NhanVien->getAll();
        $data['title'] = "Danh sách nhân viên";
        return $this->load->view('Admin/View_NhanVien', $data);
    }

    public function page($trang)
    {
        $data['title'] = "Danh sách nhân viên";
        $totalRecords = $this->Model_NhanVien->checkNumber();
        $recordsPerPage = 10;
        $totalPages = ceil($totalRecords / $recordsPerPage);

        if($trang < 1 || $trang > $totalPages){
            return redirect(base_url('admin/nhan-vien/'));
        }

        $start = ($trang - 1) * $recordsPerPage;

        $data['totalPages'] = $totalPages;
        $data['list'] = $this->Model_NhanVien->getAll($start);
        return $this->load->view('Admin/View_NhanVien', $data);
    }

    public function add()
    {
        $data['title'] = "Thêm nhân viên mới";
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $hoten = $this->input->post('hoten');
            $taikhoan = $this->input->post('taikhoan');
            $matkhau = $this->input->post('matkhau');
            $email = $this->input->post('email');
            $sodienthoai = $this->input->post('sodienthoai');
            $phanquyen = $this->input->post('phanquyen');
            $trangthai = $this->input->post('trangthai');

            if(empty($hoten) || empty($taikhoan) || empty($matkhau) || empty($email) || empty($sodienthoai)){
                $data['error'] = "Vui lòng nhập đủ thông tin!";
                return $this->load->view('Admin/View_ThemNhanVien', $data);
            }

            $this->Model_NhanVien->add($hoten, $taikhoan, $matkhau, $email, $sodienthoai, $phanquyen, $trangthai);

            $this->session->set_flashdata('success', 'Thêm nhân viên thành công!');
            return redirect(base_url('admin/nhan-vien/'));
        }
        return $this->load->view('Admin/View_ThemNhanVien', $data);
    }

    public function update($manhanvien)
    {
        if(count($this->Model_NhanVien->getById($manhanvien)) <= 0){
            $this->session->set_flashdata('error', 'Nhân viên không tồn tại!');
            return redirect(base_url('admin/nhan-vien/'));
        }

        $data['title'] = "Cập nhật thông tin nhân viên";
        $data['detail'] = $this->Model_NhanVien->getById($manhanvien);
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $hoten = $this->input->post('hoten');
            $taikhoan = $this->input->post('taikhoan');
            $email = $this->input->post('email');
            $sodienthoai = $this->input->post('sodienthoai');
            $phanquyen = $this->input->post('phanquyen');
            $trangthai = $this->input->post('trangthai');
            $matkhau = $this->Model_NhanVien->getById($manhanvien)[0]['MatKhau'];

            if(empty($hoten) || empty($taikhoan) || empty($email) || empty($sodienthoai)){
                $data['error'] = "Vui lòng nhập đủ thông tin!";
                return $this->load->view('Admin/View_SuaNhanVien', $data);
            }

            if(isset($_POST['matkhau']) && !empty($_POST['matkhau'])){
                $matkhau = md5($this->input->post('matkhau'));
            }

            $this->Model_NhanVien->updateNhanVien($hoten, $taikhoan, $email, $sodienthoai, $phanquyen, $matkhau, $trangthai, $manhanvien);

            $data['success'] = "Cập nhật thông tin nhân viên thành công!";
            $data['detail'] = $this->Model_NhanVien->getById($manhanvien);
            return $this->load->view('Admin/View_SuaNhanVien', $data);
        }

        return $this->load->view('Admin/View_SuaNhanVien', $data);
    }

    public function delete($manhanvien)
    {
        if(count($this->Model_NhanVien->getById($manhanvien)) <= 0){
            $this->session->set_flashdata('error', 'Nhân viên không tồn tại!');
            return redirect(base_url('admin/nhan-vien/'));
        }

        if($this->Model_NhanVien->getById($manhanvien)[0]['TaiKhoan'] == $this->session->userdata('taikhoan')){
            $this->session->set_flashdata('error', 'Bạn không được xóa chính mình!');
            return redirect(base_url('admin/nhan-vien/'));
        }

        $this->Model_NhanVien->delete($manhanvien);

        $this->session->set_flashdata('success', 'Xóa nhân viên thành công!');
        return redirect(base_url('admin/nhan-vien/'));
    }
}

/* End of file NhanVien.php */
/* Location: ./application/controllers/NhanVien.php */
