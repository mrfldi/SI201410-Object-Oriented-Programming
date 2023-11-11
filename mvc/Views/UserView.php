<?php

namespace Views;

class UserView {
    public function displayUsers($users) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Action</th></tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['username']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td><a href='index.php?action=update&id={$user['id']}'>Update</a> | <a href='index.php?action=delete&id={$user['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function displayUser($user) {
        if ($user === null) {
            echo "User not found.";
        } else {
            echo "ID: {$user['id']}, Username: {$user['username']}, Email: {$user['email']}<br>";
        }
    }
}
