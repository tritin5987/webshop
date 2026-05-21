<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chatbot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Web/Model_ChuyenMuc');
        $this->load->model('Web/Model_SanPham');
        $this->load->model('Web/Model_HoaDon');
    }

    // Lấy danh sách các chuyên mục đang hoạt động
    public function get_categories() {
        $categories = $this->Model_ChuyenMuc->getAll();
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($categories));
    }

    // Tìm kiếm và đề xuất sản phẩm dựa trên chuyên mục và khoảng giá
    public function get_recommendations() {
        $category_id = $this->input->post('category_id');
        $price_max = $this->input->post('price_max');

        $sql = "SELECT * FROM sanpham WHERE TrangThai = 1";
        $params = array();

        if (!empty($category_id)) {
            $sql .= " AND MaChuyenMuc = ?";
            $params[] = $category_id;
        }

        if (!empty($price_max)) {
            $sql .= " AND GiaBan <= ?";
            $params[] = $price_max;
        }

        $sql .= " ORDER BY GiaBan DESC LIMIT 6";
        
        $query = $this->db->query($sql, $params);
        $products = $query->result_array();

        // Định dạng lại giá bán dễ nhìn
        foreach ($products as &$product) {
            $product['formatted_price'] = number_format($product['GiaBan']) . 'đ';
            $product['formatted_old_price'] = number_format($product['GiaGoc']) . 'đ';
            $product['detail_url'] = base_url('san-pham/' . $product['DuongDan'] . '/');
        }

        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($products));
    }

    // Tra cứu trạng thái đơn hàng nhanh
    public function check_order() {
        $order_id = trim($this->input->post('order_id'));

        if (empty($order_id) || !is_numeric($order_id)) {
            $reply = "Mã đơn hàng không hợp lệ. Vui lòng chỉ nhập số!";
            return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['reply' => $reply]));
        }

        $sql = "SELECT TrangThai, TongTien, ThoiGian, SoLuong, DiaChi FROM hoadon WHERE MaHoaDon = ?";
        $query = $this->db->query($sql, array($order_id));
        $order = $query->row_array();

        if ($order) {
            $status_text = "";
            $status_badge = "secondary";
            switch($order['TrangThai']) {
                case 1: 
                    $status_text = "Chờ duyệt đơn"; 
                    $status_badge = "warning";
                    break;
                case 2: 
                    $status_text = "Đang giao hàng"; 
                    $status_badge = "info";
                    break;
                case 3: 
                    $status_text = "Đã thanh toán & hoàn thành"; 
                    $status_badge = "success";
                    break;
                case 4: 
                    $status_text = "Đã hủy đơn"; 
                    $status_badge = "danger";
                    break;
                default: 
                    $status_text = "Chưa xác định";
            }

            $reply = "📦 <strong>Thông tin đơn hàng #{$order_id}:</strong><br>" .
                     "- Trạng thái: <span class='badge bg-{$status_badge}'>{$status_text}</span><br>" .
                     "- Tổng thanh toán: <strong>" . number_format($order['TongTien']) . "đ</strong><br>" .
                     "- Số lượng sản phẩm: <strong>{$order['SoLuong']}</strong><br>" .
                     "- Địa chỉ giao hàng: <em>{$order['DiaChi']}</em><br>" .
                     "- Ngày đặt: " . date('d/m/Y H:i', strtotime($order['ThoiGian']));
        } else {
            $reply = "❌ Không tìm thấy đơn hàng #{$order_id} trên hệ thống. Vui lòng kiểm tra lại mã số đơn hàng!";
        }

        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(['reply' => $reply]));
    }

    // Lấy lịch sử chat của phiên hiện tại
    public function get_chat_history() {
        if ($this->session->has_userdata('chat_session_token')) {
            $token = $this->session->userdata('chat_session_token');
            $sql = "SELECT sender, message FROM lichsu_chatbot WHERE session_token = ? ORDER BY created_at ASC";
            $query = $this->db->query($sql, array($token));
            $history = $query->result_array();
            
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($history));
        } else {
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(array()));
        }
    }

    // Lưu một tin nhắn (từ user hoặc bot) vào database
    public function save_chat() {
        $sender = $this->input->post('sender');
        $message = $this->input->post('message');

        if (!empty($sender) && !empty($message)) {
            $this->save_message($sender, $message);
        }

        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(['status' => 'success']));
    }

    private function save_message($sender, $message) {
        if ($this->session->has_userdata('chat_session_token')) {
            $makhachhang = $this->session->has_userdata('makhachhang') ? $this->session->userdata('makhachhang') : 0;
            $data = array(
                'session_token' => $this->session->userdata('chat_session_token'),
                'makhachhang' => $makhachhang,
                'sender' => $sender,
                'message' => $message
            );
            $this->db->insert('lichsu_chatbot', $data);
        }
    }
}
