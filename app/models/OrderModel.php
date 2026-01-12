<?php
class OrderModel extends Database {
    
    public function __construct() {
        parent::__construct();
    }

    public function create($userId, $produkId, $jumlah, $total) {
        $sql = "INSERT INTO pesanan (user_id, produk_id, jumlah, total_harga, status) 
                VALUES ('$userId', '$produkId', '$jumlah', '$total', 'pending')";
        return $this->conn->query($sql);
    }

    public function getByUser($userId) {
        $sql = "SELECT * FROM pesanan WHERE user_id = '$userId' ORDER BY tanggal_pesan DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPendingOrders() {
        $sql = "SELECT pesanan.*, users.nama as nama_user, produk.nama_produk 
            FROM pesanan 
            JOIN users ON pesanan.user_id = users.id 
            JOIN produk ON pesanan.produk_id = produk.id 
            WHERE pesanan.status = 'pending' 
            ORDER BY pesanan.tanggal_pesan DESC";
            
        $result = $this->conn->query($sql);
    
        if (!$result) {
        die("Error Query: " . $this->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateStatus($id, $status) {
        $id = $this->conn->real_escape_string($id);
        $status = $this->conn->real_escape_string($status);
    
        $sql = "UPDATE pesanan SET status = '$status' WHERE id = '$id'";
        return $this->conn->query($sql);
    }
}