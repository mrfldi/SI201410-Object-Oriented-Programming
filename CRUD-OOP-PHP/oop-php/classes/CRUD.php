<?php
class CRUD extends Database {
    public function create($name, $email) {
        $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        return $this->conn->query($query);
    }

    public function read() {
        $query = "SELECT * FROM users";
        return $this->conn->query($query);
    }

    public function update($id, $name, $email) {
        $query = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
        return $this->conn->query($query);
    }

    public function delete($id) {
        $query = "DELETE FROM users WHERE id = $id";
        return $this->conn->query($query);
    }
}
