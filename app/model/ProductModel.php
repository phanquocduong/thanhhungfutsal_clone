<?php
// Tương tác với bảng sanpham
    class ProductModel {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        function getProducts($condition = '', $params = [], $order = '', $start = 0, $limit = 0) {
            $sql = "SELECT * FROM sanpham";
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
        

        function getProductCount($condition = '', $params = []) {
            $sql = "SELECT count(*) AS soluong FROM sanpham $condition";
            return $this->db->get($sql, $params)['soluong'];
        }

        public function getProduct($id) {
            $sql = "SELECT * FROM sanpham s  INNER JOIN danhmuc d ON s.madm = d.madm WHERE s.masp = ?";
            return $this->db->get($sql, [$id]);
        }

        public function getRelatedProducts($categoryId, $productId) {
            return $this->getProducts('WHERE madm = ? AND masp != ?', [$categoryId, $productId], 'rand()', 0, 4);
        }

        public function addProduct($cate, $name, $priceCurrent, $priceOld, $percent, $imageMain, $new, $size, $shortDesc, $descDetails, $descImage1, $descImage2) {
            $sql = "INSERT INTO sanpham (`madm`, `tensp`, `giahientai`, `giacu`, `phantramgiamgia`, `anhsp`, `moiramat`, `kichthuoc`, `motangan`, `motachitiet`, `anhmota1`, `anhmota2`)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            return $this->db->execute($sql, [$cate, $name, $priceCurrent, $priceOld, $percent, $imageMain, $new, $size, $shortDesc, $descDetails, $descImage1, $descImage2]);
        }

        public function editProduct($masp, $cate, $name, $priceCurrent, $priceOld, $percent, $imageMain, $new, $size, $shortDesc, $descDetails, $descImage1, $descImage2) {
            $sql = "UPDATE sanpham SET `madm` = ?, `tensp` = ?, `giahientai` = ?, `giacu` = ?, `phantramgiamgia` = ?, `anhsp` = ?, 
            `moiramat` = ?, `kichthuoc` = ?, `motangan` = ?, `motachitiet` = ?, `anhmota1` = ?, `anhmota2` = ? WHERE masp = ?";
            return $this->db->execute($sql, [$cate, $name, $priceCurrent, $priceOld, $percent, $imageMain, $new, $size, $shortDesc, $descDetails, $descImage1, $descImage2, $masp]);
        }

        public function deleteProduct($id) {
            $sql = "DELETE FROM sanpham WHERE masp = ?";
            return $this->db->execute($sql, [$id]);
        }
    }
?>