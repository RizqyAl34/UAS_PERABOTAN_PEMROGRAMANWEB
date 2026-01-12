<?php
class User extends Database {

    public function login($email) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE email = ? LIMIT 1"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result();
    }
}
