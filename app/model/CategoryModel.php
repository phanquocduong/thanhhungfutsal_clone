<?php
// Tương tác với bảng danhmuc
    class CategoryModel {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        function getCategories($condition = '', $params = [], $order = '', $start = 0, $limit = 0) {
            $sql = "SELECT * FROM danhmuc";
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

        function getCategoryCount($condition = '', $params = []) {
            $sql = "SELECT count(*) AS soluong FROM danhmuc $condition";
            return $this->db->get($sql, $params)['soluong'];
        }

        public function getCategory($id) {
            $sql = "SELECT * FROM danhmuc WHERE madm = ?";
            return $this->db->get($sql, [$id]);
        }

        public function addCategory($name, $image) {
            $sql = "INSERT INTO danhmuc (`tendm`, `anhdm`) VALUES (?, ?)";
            return $this->db->execute($sql, [$name, $image]);
        }

        public function editCategory($madm, $name, $image) {
            $sql = "UPDATE danhmuc SET `tendm` = ?, `anhdm` = ? WHERE madm = ?";
            return $this->db->execute($sql, [$name, $image, $madm]);
        }

        public function deleteCategory($id) {
            $sql = "DELETE FROM danhmuc WHERE madm = ?";
            return $this->db->execute($sql, [$id]);
        }
    }
?>