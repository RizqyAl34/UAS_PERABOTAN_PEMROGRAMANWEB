<?php
class ProdukModel extends Database {

    public function __construct() {
        // Panggil parent construct agar koneksi $conn diisi
        parent::__construct(); 
    }

    public function getAll($limit = 10, $offset = 0, $keyword = '') {
        // Gunakan $this->conn (sesuai dengan Database.php)
        return $this->conn->query("
            SELECT * FROM produk
            WHERE nama_produk LIKE '%$keyword%'
            LIMIT $limit OFFSET $offset
        ");
    }

    public function insert($data) {
        // Gunakan $this->conn
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
        // Gunakan $this->conn
        $this->conn->query("DELETE FROM produk WHERE id=$id");
    }
}