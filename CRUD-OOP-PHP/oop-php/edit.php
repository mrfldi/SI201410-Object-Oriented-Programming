<?php
require 'classes/Database.php';
require 'classes/CRUD.php';

// Inisialisasi objek CRUD
$crud = new CRUD();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $crud->update($id, $name, $email);
        header("Location: index.php");
    }

    $result = $crud->read();
    $data = $result->fetch_assoc();
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <input type="text" name="name" placeholder="Name" value="<?php echo $data['name']; ?>">
        <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>">
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
