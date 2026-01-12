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
    
    public function getById($id) {
        $id = $this->conn->real_escape_string($id);
        $result = $this->conn->query("SELECT * FROM produk WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    public function update($id, $data) {
        $id = $this->conn->real_escape_string($id);
        $nama = $this->conn->real_escape_string($data['nama_produk']);
        $kategori = $this->conn->real_escape_string($data['kategori']);
        $harga = $this->conn->real_escape_string($data['harga']);
        $stok = $this->conn->real_escape_string($data['stok']);

        $sql = "UPDATE produk SET 
                nama_produk = '$nama', 
                kategori = '$kategori', 
                harga = '$harga', 
                stok = '$stok' 
                WHERE id = '$id'";
        return $this->conn->query($sql);
    }
}