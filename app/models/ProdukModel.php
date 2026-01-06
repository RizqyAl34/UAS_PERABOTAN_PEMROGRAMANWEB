<?php
class ProdukModel extends Database {

    public function __construct() {
        parent::__construct(); 
    }

    public function getAll($limit = 10, $offset = 0, $keyword = '') {
        return $this->conn->query("
            SELECT * FROM produk
            WHERE nama_produk LIKE '%$keyword%'
            LIMIT $limit OFFSET $offset
        ");
    }

    public function insert($data) {
        $this->conn->query("
            INSERT INTO produk VALUES (
                null,
                '{$data['nama_produk']}',
                '{$data['kategori']}',
                '{$data['harga']}',
                '{$data['stok']}'
            )
        ");
    }

    public function delete($id) {
        $this->conn->query("DELETE FROM produk WHERE id=$id");
    }
}