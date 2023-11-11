<?php

require_once 'vendor/autoload.php';

use Controllers\UserController;

$userController = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addUser'])) {
        // Tambah Pengguna
        $userController->addUser(['username' => $_POST['username'], 'email' => $_POST['email']]);
    } elseif (isset($_POST['updateUser'])) {
        // Perbarui Pengguna dengan ID tertentu
        $userController->updateUser($_POST['userId'], ['username' => $_POST['username'], 'email' => $_POST['email']]);
    } elseif (isset($_POST['deleteUser'])) {
        // Hapus Pengguna dengan ID tertentu
        $userController->deleteUser($_POST['userId']);
    }
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $userId = $_GET['id'];

    if ($action === 'update') {
        // Tampilkan formulir update
        $user = $userController->getModel()->getUserById($userId);
        echo "<h2>Update User</h2>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='userId' value='{$user['id']}'>";
        echo "<label for='username'>New Username:</label>";
        echo "<input type='text' name='username' value='{$user['username']}' required>";
        echo "<label for='email'>New Email:</label>";
        echo "<input type='email' name='email' value='{$user['email']}' required>";
        echo "<button type='submit' name='updateUser'>Update User</button>";
        echo "</form>";
    } elseif ($action === 'delete') {
        // Hapus pengguna
        $userController->deleteUser($userId);
    }
}

// Tampilkan Formulir
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC CRUD Form</title>
</head>
<body>

<h2>Add User</h2>
<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <button type="submit" name="addUser">Add User</button>
</form>

<h2>List Users</h2>
<?php
// Tampilkan daftar pengguna
$userController->listUsers();
?>

</body>
</html>
