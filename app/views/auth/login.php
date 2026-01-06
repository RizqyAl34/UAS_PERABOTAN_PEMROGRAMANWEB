<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Toko Perabotan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm w-100" style="max-width: 400px;">
        <div class="card-body p-4">

            <h4 class="text-center mb-3">Login</h4>
            <p class="text-center text-muted mb-4">
                Toko Perabotan Sederhana
            </p>

            <form action="<?= BASE_URL ?>/auth/prosesLogin" method="POST">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control"
                        placeholder="contoh: admin@toko.com"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control"
                        placeholder="Masukkan password"
                        required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>

            </form>

            <hr>

            <div class="text-center small text-muted">
                © <?= date('Y') ?> Toko Perabotan
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
