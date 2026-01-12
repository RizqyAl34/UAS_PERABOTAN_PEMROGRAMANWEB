<?php
class ProdukController extends Controller {

    public function index() {
        Auth::check();    
        Auth::admin();      

        require_once '../app/models/Produk.php';
        $produkModel = new Produk();

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

        header("Location: " . BASE_URL . "/produk");
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

    public function edit($id) {
        Auth::check();
        Auth::admin();

        require_once '../app/models/ProdukModel.php';
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->getById($id);

        require_once '../app/views/admin/edit_produk.php';
    }

    public function update($id) {
        Auth::check();
        Auth::admin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once '../app/models/ProdukModel.php';
            $produkModel = new ProdukModel();
            
            if ($produkModel->update($id, $_POST)) {
                header("Location: " . BASE_URL . "/dashboard/produk?status=updated");
                exit;
            }
        }
    }
}
