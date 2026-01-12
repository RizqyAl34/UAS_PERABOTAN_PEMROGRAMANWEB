<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk | Toko Perabotan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Data Produk</h3>
            <a href="<?= BASE_URL ?>/dashboard/admin" class="btn btn-light btn-sm">Kembali ke Dashboard</a>
        </div>
        <div class="card-body">
            
            <form action="" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama produk...">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>

            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['produk'])): ?>
                        <?php foreach($data['produk'] as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['nama_produk']) ?></td>
                            <td><span class="badge bg-info text-dark"><?= htmlspecialchars($p['kategori']) ?></span></td>
                            <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                            <td class="text-center">
                                <a href="<?= BASE_URL ?>/produk/edit/<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/produk/delete/<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Data produk tidak ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>