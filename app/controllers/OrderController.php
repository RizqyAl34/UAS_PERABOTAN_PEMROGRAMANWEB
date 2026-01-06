<?php
class OrderController extends Controller {
    
    public function proses() { // Hapus parameter $id di dalam kurung
        Auth::check();
        Auth::admin();

    // Mengambil ID dari URL manual (asumsi URL: /order/proses/12)
        $url = explode('/', $_GET['url']);
        $id = isset($url[2]) ? $url[2] : null; 

        if (!$id) {
        die("ID Pesanan tidak ditemukan.");
        }

        require_once __DIR__ . '/../models/OrderModel.php';
        $orderModel = new OrderModel();

        if ($orderModel->updateStatus($id, 'dibayar')) {
        header("Location: " . BASE_URL . "/dashboard/laporan?status=updated");
        exit;
        } else {
        echo "Gagal memproses pesanan.";
        }
    }
}