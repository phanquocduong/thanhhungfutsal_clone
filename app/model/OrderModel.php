<?php
    class OrderModel {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        function createOrder($idClient, $fullname, $email, $tel, $address, $method, $total) {
            $sql = "INSERT INTO donhang (`makh`, `hotenkh`, `email`, `tongtien`, `phuongthucthanhtoan`, `sodienthoai`, `diachi`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $this->db->execute($sql, [$idClient,$fullname, $email, $total, $method, $tel, $address]);
            $lastId = $this->db->lastInsertId();
            return $lastId;
        }

        function createOrderDetails($idOrder, $idProduct, $name, $img, $size, $quantity, $price) {
            $sql = "INSERT INTO chitietdonhang (`madh`, `masp`, `tensp`, `anhsp`, `kichthuoc`, `soluong`, `dongia`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $this->db->execute($sql, [$idOrder, $idProduct,$name,$img,$size, $quantity, $price]);
        }

        function getOrders($condition = '', $params = [], $order = '', $start = 0, $limit = 0) {
            $sql = "SELECT * FROM donhang";
            if ($condition) {
                $sql .= " $condition";
            }
            if ($order) {
                $sql .= " ORDER BY $order";
            }
            if ($limit > 0) {
                $sql .= " LIMIT $start, $limit";
            }
            return $this->db->getAll($sql, $params);
        }

        function getOrderCount($condition = '', $params = []) {
            $sql = "SELECT count(*) AS soluong FROM donhang $condition";
            return $this->db->get($sql, $params)['soluong'];
        }

        function getOrder($id) {
            $sql = "SELECT * FROM donhang WHERE madh = ?";
            return $this->db->get($sql, [$id]);
        }

        function getOrderDetails($id) {
            $sql = "SELECT * FROM chitietdonhang WHERE madh = ?";
            return $this->db->getAll($sql, [$id]);
        }

        function updateOrderStatus($id, $status) {
            $sql = "UPDATE donhang SET `trangthai` = ? WHERE madh = ?";
            return $this->db->execute($sql, [$status, $id]);
        }
    }
?>