<?php

namespace Models;

use Config\Database;

class UserModel {
    public function getAllUsers() {
        $pdo = Database::connect();
        $stmt = $pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserById($userId) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addUser($userData) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare('INSERT INTO users (username, email) VALUES (:username, :email)');
        $stmt->bindParam(':username', $userData['username']);
        $stmt->bindParam(':email', $userData['email']);
        $stmt->execute();
    }

    public function updateUser($userId, $userData) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare('UPDATE users SET username = :username, email = :email WHERE id = :id');
        $stmt->bindParam(':username', $userData['username']);
        $stmt->bindParam(':email', $userData['email']);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
    }

    public function deleteUser($userId) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
    }
}
