<?php
require 'classes/Database.php';
require 'classes/CRUD.php';

// Inisialisasi objek CRUD
$crud = new CRUD();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $crud->delete($id);
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>
