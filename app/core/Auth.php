<?php
class Auth {

    public static function check() {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }
    }

    public static function admin() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header("Location: " . BASE_URL . "/dashboard/user");
            exit;
        }
    }
}
