<?php
$userName = $_SESSION['user']['nama'];
$userRole = $_SESSION['user']['role']; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Toko Perabotan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 4px rgba(0,0,0,.08); }
        .card { border: none; border-radius: 12px; transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
        .welcome-section { background: linear-gradient(45deg, #0d6efd, #0dcaf0); color: white; border-radius: 15px; padding: 30px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🛋️ Toko Perabot</a>
        <div class="ms-auto">
            <span class="text-light me-3">Halo, <b><?= htmlspecialchars($userName) ?></b></span>
            <a href="<?= BASE_URL ?>/auth/logout" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="welcome-section mb-4 shadow">
        <h1>Selamat Datang, <?= htmlspecialchars($userName) ?>!</h1>
        <p class="lead mb-0">Anda masuk sebagai <b><?= htmlspecialchars(ucfirst($userRole)) ?></b>. Kelola toko Anda dengan mudah di sini.</p>
    </div>

    <div class="row justify-content-center">
        <?php if ($userRole == 'admin'): ?>
            <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100 border-primary">
                <div class="card-body text-center">
                    <div class="display-6 mb-3">📦</div>
                    <h5 class="card-title">Kelola Produk</h5>
                    <p class="card-text text-muted">Update stok, harga, dan deskripsi perabotan.</p>
                    <a href="<?= BASE_URL ?>/dashboard/produk" class="btn btn-primary w-100">Buka Katalog</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 mb-3">📊</div>
                    <h5 class="card-title">Laporan</h5>
                    <p class="card-text text-muted">Lihat pesanan pending dari user.</p>
                    <a href="<?= BASE_URL ?>/dashboard/laporan" class="btn btn-primary w-100">Buka Laporan</a>
                </div>
            </div>
        </div>

        <?php else: ?>
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="display-6 mb-3">👤</div>
                        <h5 class="card-title">Profil Saya</h5>
                        <p class="card-text text-muted">Ubah data diri dan alamat pengiriman.</p>
                        <a href="/dashboard/profile" class="btn btn-primary w-100">Pengaturan Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="display-6 mb-3">🛍️</div>
                        <h5 class="card-title">Pesanan Saya</h5>
                        <p class="card-text text-muted">Cek status pengiriman barang Anda.</p>
                        <a href="/dashboard/orders" class="btn btn-secondary w-100">Lihat Pesanan</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    <footer class="text-center mt-5 text-muted py-3">
        <small>&copy; Universitas Pelita Bangsa - Admin Panel</small>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>