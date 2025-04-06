<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_NhanVien extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getById($MaNhanVien){
		$sql = "SELECT * FROM nhanvien WHERE MaNhanVien = ?";
		$result = $this->db->query($sql, array($MaNhanVien));
		return $result->result_array();
	}


	public function update($HoTen,$TaiKhoan,$MatKhau,$Email,$SoDienThoai,$MaNhanVien){
		$sql = "UPDATE nhanvien SET HoTen = ?, TaiKhoan = ?, MatKhau = ?, Email = ?, SoDienThoai = ? WHERE MaNhanVien = ?";
		$result = $this->db->query($sql, array($HoTen,$TaiKhoan,$MatKhau,$Email,$SoDienThoai,$MaNhanVien));
		return $result;
	}

	// Thêm nhân viên mới
    public function add($hoten, $taikhoan, $matkhau, $email, $sodienthoai, $phanquyen)
    {
        $data = array(
            "HoTen" => $hoten,
            "TaiKhoan" => $taikhoan,
            "MatKhau" => md5($matkhau), // Bảo mật mật khẩu
            "Email" => $email,
            "SoDienThoai" => $sodienthoai,
            "PhanQuyen" => $phanquyen,
            "TrangThai" => 1,
        );

        $this->db->insert('nhanvien', $data);
        $lastInsertedId = $this->db->insert_id();

        return $lastInsertedId;
    }

    // Đếm số lượng nhân viên
    public function checkNumber()
    {
        $sql = "SELECT * FROM nhanvien";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    // Lấy danh sách nhân viên (phân trang)
    public function getAll($start = 0, $end = 10)
    {
        $sql = "SELECT * FROM nhanvien ORDER BY MaNhanVien DESC LIMIT ?, ?";
        $result = $this->db->query($sql, array($start, $end));
        return $result->result_array();
    }

    // Tìm kiếm nhân viên theo từ khóa
    public function getAllSearch($search, $start = 0, $end = 10)
    {
        $sql = "SELECT * FROM nhanvien WHERE TrangThai = 1";

        if (!empty($search)) {
            $sql .= " AND (HoTen LIKE ? OR TaiKhoan LIKE ? OR Email LIKE ? OR SoDienThoai LIKE ?)";
            $params = array("%$search%", "%$search%", "%$search%", "%$search%", $start, $end);
        } else {
            $params = array($start, $end);
        }

        $sql .= " ORDER BY MaNhanVien DESC LIMIT ?, ?";
        $result = $this->db->query($sql, $params);
        return $result->result_array();
    }

    // Đếm số lượng nhân viên tìm kiếm được
    public function checkNumberSearch($search)
    {
        $sql = "SELECT * FROM nhanvien WHERE TrangThai = 1";

        if (!empty($search)) {
            $sql .= " AND (HoTen LIKE ? OR TaiKhoan LIKE ? OR Email LIKE ? OR SoDienThoai LIKE ?)";
            $params = array("%$search%", "%$search%", "%$search%", "%$search%");
        } else {
            $params = array();
        }

        $result = $this->db->query($sql, $params);
        return $result->num_rows();
    }

    // Cập nhật thông tin nhân viên
    public function updateNhanVien($hoten, $taikhoan, $email, $sodienthoai, $phanquyen, $matkhau, $trangthai, $manhanvien){
        $sql = "UPDATE nhanvien SET HoTen = ?, TaiKhoan = ?, Email = ?, SoDienThoai = ?, PhanQuyen = ?, MatKhau = ?, TrangThai = ? WHERE MaNhanVien = ?";
        $result = $this->db->query($sql, array($hoten, $taikhoan, $email, $sodienthoai, $phanquyen, $matkhau, $trangthai, $manhanvien));
        return $result;
    }

    // Xóa nhân viên (chuyển trạng thái về 0)
    public function delete($manhanvien)
    {
        $sql = "DELETE FROM nhanvien WHERE MaNhanVien = ?";
        $result = $this->db->query($sql, array($manhanvien));
        return $result;
    }
}

/* End of file Model_NhanVien.php */
/* Location: ./application/models/Model_NhanVien.php */