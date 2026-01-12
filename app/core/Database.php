<?php
class Database {

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli(
            "localhost",
            "root",
            "",
            "toko_perabotan"
        );

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }
}
