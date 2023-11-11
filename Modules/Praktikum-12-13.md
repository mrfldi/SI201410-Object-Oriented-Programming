# Praktikum 12 & 13

## Mysql Object, PDO and MVC

---

MySQL Object dalam konteks PHP mengacu pada penggunaan fungsi-fungsi khusus yang disediakan oleh ekstensi MySQL dalam PHP untuk berinteraksi dengan database MySQL. Ini adalah salah satu metode tradisional untuk mengelola koneksi database dan menjalankan query dalam PHP, tetapi sekarang dianggap usang dan tidak disarankan untuk digunakan dalam pengembangan baru.

MySQL Object digunakan dengan memanfaatkan fungsi-fungsi seperti mysql_connect, mysql_select_db, mysql_query, dan mysql_fetch_assoc untuk membuat koneksi ke database, memilih database yang benar, menjalankan query, dan mengambil hasilnya. 

```php
<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
```

Dalam PHP sendiri MySQL Object ini sudah tidak disarankan kembali karena masalah keamanan dan memang tidak mendapat update lagi mulai dari PHP 7 ke atas.

## PDO (PHP Data Object)

 Ini adalah ekstensi dalam PHP yang menyediakan antarmuka konsisten untuk berinteraksi dengan berbagai jenis database relasional, termasuk MySQL, PostgreSQL, SQLite, dan banyak lainnya. PDO memungkinkan pengembang PHP untuk menulis kode database yang lebih portabel dan mudah di-maintain, karena kode yang ditulis dengan PDO dapat dengan mudah diadaptasi untuk digunakan dengan database yang berbeda tanpa perubahan besar dalam logika aplikasi.

Beberapa fitur dan manfaat utama dari PDO meliputi:

1. Portabilitas: Anda dapat menggunakan kode yang sama untuk berinteraksi dengan berbagai jenis database. Ini sangat berguna jika Anda perlu mengubah database yang digunakan dalam proyek Anda.

2. Keselamatan: PDO memungkinkan penggunaan prepared statements, yang membantu melindungi aplikasi Anda dari serangan SQL injection. Ini adalah teknik yang sangat penting untuk menjaga keamanan aplikasi.

3. Manajemen Kesalahan yang Lebih Baik: PDO menyediakan mekanisme untuk menangani kesalahan database dengan lebih baik, memungkinkan Anda untuk mengatasi kesalahan dengan cara yang lebih elegan.

4. Kemampuan Transaksi: Anda dapat dengan mudah memulai dan mengelola transaksi dalam PDO, yang penting ketika Anda perlu menjalankan beberapa perintah SQL dalam satu transaksi.

5. Kode yang Lebih Jelas dan Dapat Dibaca: Kode yang ditulis dengan PDO sering kali lebih mudah dibaca dan dipahami karena memiliki sintaks yang lebih konsisten dan intuitif.

Berikut adalah contoh sederhana penggunaan PDO untuk membuat koneksi ke database MySQL dan menjalankan query:

```php
// Membuat koneksi ke database MySQL menggunakan PDO
$pdo = new PDO("mysql:host=localhost;dbname=nama_database", "username", "password");

// Menjalankan query SQL
$query = "SELECT * FROM tabel";
$result = $pdo->query($query);

// Mengambil data hasil query
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Lakukan sesuatu dengan data
}

// Menutup koneksi (secara otomatis ditutup saat objek PDO dihancurkan)
$pdo = null;
```

### Membuat Koneksi dengan PDO

```php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=nama_database", "username", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
```

### Membaca data (Read) dengan PDO

```php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=nama_database", "username", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
```

### Memperbarui data (Update) dengan PDO

```php
try {
    $id_produk = 1; // ID produk yang akan diperbarui
    $harga_baru = 150; // Harga baru

    $query = "UPDATE produk SET harga_produk = :harga WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":harga", $harga_baru);
    $stmt->bindParam(":id", $id_produk);
    $stmt->execute();

    echo "Data berhasil diperbarui.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
```

### Menghapus data (Delete) dengan PDO

```php
try {
    $id_produk = 1; // ID produk yang akan dihapus

    $query = "DELETE FROM produk WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id_produk);
    $stmt->execute();

    echo "Data berhasil dihapus.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
```

## MVC (Model View Controller)

MVC adalah pendekatan yang umum digunakan dalam pengembangan web untuk membuat aplikasi lebih terstruktur dan mudah di-maintain. Berikut adalah panduan umum untuk membuat struktur MVC dengan PHP:

1. Model (M):
Buat direktori atau folder untuk model. Model adalah bagian yang berhubungan dengan logika bisnis dan interaksi dengan database.
Buat kelas-kelas dalam model untuk merepresentasikan entitas seperti objek database atau tabel. Misalnya, jika Anda memiliki tabel "produk," buat kelas "Product" untuk mengelola data produk.
Dalam kelas model, Anda dapat menulis metode untuk mengakses, menyimpan, memperbarui, dan menghapus data dari database.
2. View (V):
Buat direktori atau folder untuk view. View adalah bagian yang berhubungan dengan tampilan atau antarmuka pengguna.
Buat berkas-berkas template HTML yang akan digunakan untuk menampilkan data kepada pengguna. Anda dapat menggunakan bahasa templating seperti PHP, Twig, atau Blade untuk menggabungkan data dari model ke dalam tampilan.
3. Controller (C):
Buat direktori atau folder untuk controller. Controller adalah bagian yang berfungsi sebagai pengontrol lalu lintas dalam aplikasi.
Buat kelas-kelas dalam controller untuk mengelola permintaan pengguna, mengambil data dari model, dan mengirimkan data ke tampilan.
Dalam kelas controller, Anda dapat mendefinisikan metode yang menerima permintaan HTTP (misalnya, GET atau POST), memproses input pengguna, dan mengarahkan ke tampilan yang sesuai.