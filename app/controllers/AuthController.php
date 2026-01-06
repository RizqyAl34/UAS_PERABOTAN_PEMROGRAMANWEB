<?php
class AuthController extends Controller {

    public function login() {
        require_once '../app/views/auth/login.php';
    }

    public function prosesLogin() {
        $userModel = $this->model('User');
        $result = $userModel->login($_POST['email']);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user;

                if ($user['role'] === 'admin') {
                    header("Location: " . BASE_URL . "/dashboard/admin");
                } else {
                    header("Location: " . BASE_URL . "/dashboard/user");
                }
                exit;
            }
        }

        header("Location: " . BASE_URL . "/auth/login");
        exit;
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL . "/auth/login");
        exit;
    }
}
