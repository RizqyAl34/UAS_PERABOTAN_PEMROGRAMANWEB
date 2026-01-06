<?php
class DashboardController extends Controller {

    // 1. DASHBOARD ADMIN
    public function admin() {
        Auth::check();
        Auth::admin();
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    // 2. KELOLA PRODUK (UNTUK ADMIN)
    public function produk() {
        Auth::check();
        Auth::admin();

        // Tentukan halaman saat ini untuk pagination
        $halamanAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $jumlahDataPerHalaman = 10;
        $offset = ($halamanAktif - 1) * $jumlahDataPerHalaman;

        // Ambil kata kunci pencarian jika ada
        $keyword = isset($_GET['search']) ? $_GET['search'] : '';

        require_once __DIR__ . '/../models/ProdukModel.php';
        $produkModel = new ProdukModel();

        // Ambil data dengan limit dan offset
        $data['produk'] = $produkModel->getAll($jumlahDataPerHalaman, $offset, $keyword);
        $data['halamanAktif'] = $halamanAktif;

        require_once __DIR__ . '/../views/admin/produk.php';
    } // <--- Penutup fungsi produk

    // 3. DASHBOARD USER (UNTUK PEMBELI)
    public function user() {
        Auth::check();

    // 1. Logika Pagination untuk User
        $halamanAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $jumlahDataPerHalaman = 6; // Kita set 6 saja supaya pas dengan grid 3 kolom
        $offset = ($halamanAktif - 1) * $jumlahDataPerHalaman;

        require_once __DIR__ . '/../models/ProdukModel.php';
        require_once __DIR__ . '/../models/OrderModel.php';
    
        $produkModel = new ProdukModel();
        $orderModel = new OrderModel();
    
        $data['produk']  = $produkModel->getAll($jumlahDataPerHalaman, $offset); 
        $data['pesanan'] = $orderModel->getByUser($_SESSION['user']['id']); 
        $data['halamanAktif'] = $halamanAktif;
    
        require_once __DIR__ . '/../views/user/dashboard.php';
    }
    public function laporan() {
        Auth::check();
        Auth::admin();

        require_once __DIR__ . '/../models/OrderModel.php';
        $orderModel = new OrderModel();
    
        $data['pesanan_pending'] = $orderModel->getPendingOrders();

        require_once __DIR__ . '/../views/admin/laporan.php';
    }

}