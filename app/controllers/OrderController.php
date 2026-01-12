<?php
class OrderController extends Controller {
    
    public function checkout() {
        Auth::check();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId   = $_SESSION['user']['id'];
            $produkId = $_POST['produk_id'];
            $jumlah   = $_POST['jumlah'];
            $harga    = $_POST['harga'];
            $total    = $jumlah * $harga;

            require_once __DIR__ . '/../models/OrderModel.php';
            $orderModel = new OrderModel();

            if ($orderModel->create($userId, $produkId, $jumlah, $total)) {
                header("Location: " . BASE_URL . "/dashboard/user?order=success");
                exit;
            } else {
                echo "Gagal melakukan pemesanan.";
            }
        } else {
            header("Location: " . BASE_URL . "/dashboard/user");
        }
    }


    public function proses($id) { 
        Auth::check();
        Auth::admin(); 

        require_once __DIR__ . '/../models/OrderModel.php';
        $orderModel = new OrderModel();


        if ($orderModel->updateStatus($id, 'dibayar')) {
            header("Location: " . BASE_URL . "/dashboard/laporan?status=success");
            exit;
        } else {
            echo "Gagal memperbarui status pesanan.";
        }
    }
}