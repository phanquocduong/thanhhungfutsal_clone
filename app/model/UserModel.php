<?php
// Tương tác với bảng taikhoan
    class UserModel {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        function login($email, $password) {
            $sql = "SELECT * FROM taikhoan WHERE email = ? AND matkhau = ?";
            return $this->db->get($sql, [$email, $password]);
        }

        function checkMail($email) {
            $sql = "SELECT * FROM taikhoan WHERE email = ?";
            return $this->db->get($sql, [$email]);
        }

        function register($ho, $ten, $email, $matkhau) {
            $sql = "INSERT INTO taikhoan (`ho`, `ten`, `email`, `matkhau`) VALUES (?, ?, ?, ?)";
            return $this->db->execute($sql, [$ho, $ten, $email, $matkhau]);
        }

        function logout() {
            unset($_SESSION['user']);
        }

        public function updateAccount($matk, $ho, $ten, $sodienthoai, $diachi) {
            $sql = "UPDATE taikhoan SET `ho`=:ho, `ten`=:ten, `sodienthoai`=:sodienthoai, `diachi`=:diachi WHERE matk=:matk";
            return $this->db->execute($sql, ['matk' => $matk, 'ho' => $ho, 'ten' => $ten, 'sodienthoai' => $sodienthoai, 'diachi' => $diachi]);
        }

        public function changePassword($matk, $matkhau) {
            $sql = "UPDATE taikhoan SET `matkhau` = ? WHERE matk = ?";
            return $this->db->execute($sql, [$matkhau, $matk]);
        }

        public function addUser($ho, $ten, $email, $matkhau, $sodienthoai, $diachi, $quyen) {
            $sql = "INSERT INTO taikhoan (`ho`, `ten`, `email`, `matkhau`, `sodienthoai`, `diachi`, `quyen`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            return $this->db->execute($sql, [$ho, $ten, $email, $matkhau, $sodienthoai, $diachi, $quyen]);
        }

        public function editUser($matk, $ho, $ten, $email, $matkhau, $sodienthoai, $diachi, $quyen) {
            $sql = "UPDATE taikhoan SET `ho` = ?, `ten` = ?, `email` = ?, `matkhau` = ?, `sodienthoai` = ?, `diachi` = ?, `quyen` = ? WHERE matk = ?";
            return $this->db->execute($sql, [$ho, $ten, $email, $matkhau, $sodienthoai, $diachi, $quyen, $matk]);
        }

        public function deleteUser($matk) {
            $sql = "DELETE FROM taikhoan WHERE matk = ?";
            return $this->db->execute($sql, [$matk]);
        }

        function getUsers($condition = '', $params = [], $order = '', $start = 0, $limit = 0) {
            $sql = "SELECT * FROM taikhoan";
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

        public function getUser($id) {
            $sql = "SELECT * FROM taikhoan WHERE matk = ?";
            return $this->db->get($sql, [$id]);
        }

        function getUserCount($condition = '', $params = []) {
            $sql = "SELECT count(*) AS soluong FROM taikhoan $condition";
            return $this->db->get($sql, $params)['soluong'];
        }
    }
?>