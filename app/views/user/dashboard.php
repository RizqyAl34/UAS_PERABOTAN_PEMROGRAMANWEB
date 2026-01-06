<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Perabot | Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">🛋️ Toko Perabot</a>
        <div class="text-white">
            Halo, <?= htmlspecialchars($_SESSION['user']['nama']) ?> | 
            <a href="<?= BASE_URL ?>/auth/logout" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-3">Katalog Perabot</h4>
            <div class="row">
                <?php foreach($data['produk'] as $p): ?>
                <div class="col-md-6 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p['nama_produk'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $p['kategori'] ?></h6>
                            <p class="text-primary fw-bold">Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
                            
                            <form action="<?= BASE_URL ?>/order/checkout" method="POST">
                                <input type="hidden" name="produk_id" value="<?= $p['id'] ?>">
                                <input type="hidden" name="harga" value="<?= $p['harga'] ?>">
                                <div class="input-group input-group-sm mb-2">
                                    <span class="input-group-text">Qty</span>
                                    <input type="number" name="jumlah" class="form-control" value="1" min="1">
                                </div>
                                <button type="submit" class="btn btn-success btn-sm w-100">Beli Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-4">
            <h4 class="mb-3">Pesanan Saya</h4>
            <div class="list-group shadow-sm">
                <?php if(empty($data['pesanan'])): ?>
                    <div class="list-group-item text-center text-muted">Belum ada pesanan.</div>
                <?php endif; ?>
                <?php foreach($data['pesanan'] as $order): ?>
                <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1 text-primary">Order #<?= $order['id'] ?></h6>
                        <small class="badge bg-warning text-dark"><?= $order['status'] ?></small>
                    </div>
                    <small>Total: Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></small>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<nav aria-label="Page navigation" class="mt-4">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($data['halamanAktif'] <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $data['halamanAktif'] - 1 ?>">Sebelumnya</a>
        </li>
        
        <li class="page-item active">
            <span class="page-link"><?= $data['halamanAktif'] ?></span>
        </li>
        
        <li class="page-item">
            <a class="page-link" href="?page=<?= $data['halamanAktif'] + 1 ?>">Selanjutnya</a>
        </li>
    </ul>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>