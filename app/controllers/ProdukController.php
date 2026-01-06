<?php
class ProdukController extends Controller {

    public function index() {
        Auth::check();      // pastikan user login
        Auth::admin();      // hanya admin boleh akses

        require_once '../app/models/Produk.php';
        $produkModel = new Produk();

        // Pagination & search
        $limit = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        $keyword = isset($_GET['search']) ? $_GET['search'] : '';

        $data['produk'] = $produkModel->all($limit, $offset, $keyword);

        require_once '../app/views/admin/produk.php';
    }

    public function delete($id) {
        Auth::check();
        Auth::admin();

        require_once '../app/models/Produk.php';
        $produkModel = new Produk();
        $produkModel->delete($id);

        header("Location: " . BASE_URL . "/produk"); // redirect ke halaman produk
        exit;
    }

    public function addForm() {
        Auth::check();
        Auth::admin();
        require_once '../app/views/admin/produk_form.php';
    }

    public function addProcess() {
        Auth::check();
        Auth::admin();

        require_once '../app/models/Produk.php';
        $produkModel = new Produk();
        $produkModel->insert($_POST);

        header("Location: " . BASE_URL . "/produk");
        exit;
    }
}
