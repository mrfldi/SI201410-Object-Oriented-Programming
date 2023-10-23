# Praktikum 10

## Mengenal konsep Namespace, Autoload, dan Execption/Error Handling

---

### 1. Namespace

Namespace adalah cara untuk mengelompokkan kelas, fungsi, dan konstan ke dalam ruang nama terpisah. Penggunaan namespace digunakan untuk memecahkan 2 masalah yang berbeda:

1. Namespace memungkinkan organisasi yang lebih baik dengan mengelompokkan kelas yang bekerja sama untuk melakukan tugas.

2. Namespace mengizinkan nama yang sama digunakan untuk lebih dari satu kelas.

Deklarasi namespace dalam php dapat menggunakan ```namespace```

```php
<?php
    namespace Html;
    ...
?>
```

Note : Penggunaan namespace harus dideklarasikan pada baris pertama seperti contoh di atas. Contoh seperti berikut ini adalah penggunaan namespace yang salah.

```php
<?php
    echo "Hello World!";
    namespace Html;
    ...
?>
```

Contoh penggunaan namespace sederhana

Membuat file dengan nama ```Class.php```

```php
<?php
    namespace MyNamespace;

    class MyClass {
        public function sayHello() {
            echo "Hello from MyClass in MyNamespace!";
        }
    }
?>
```

Menggunakan namespace pada file ```index.php```

```php
<?php
    include "Class.php";

    use MyNamespace\MyClass;

    $myObj1 = new MyClass();
    $myObj1->sayHello();
?>
```

### 2. Autoload

Pada penggunaan namespace di atas kita mengetahui bahwa untuk dapat menggunakan ```MyClass``` kita masih perlu memanggil ```include "Class.php"``` mungkin hal ini tidak terlalu berpengaruh untuk menambahkan satu baris kode include saja, namun bagaimana jika kita memiliki banyak Class yang terpisah dalam beberapa file? Berdasarkan masalah itu kita memerlukan autoload, dengan menggunakan autoload kita tidak perlu memanggil satu persatu file untuk dapat menggunakan classnya. Autoload dapat digunakan dengan fungsi ```spl_autoload_register()```

```php
<?php
    spl_autoload_register(function ($class) {
    ...
});
?>
```

Cara menggunakan autoload. Siapkan struktur folder seperti berikut ini.
```
- /
    - App/
        - MyClass/
            MyClass.php
    Autoload.php
 index.php
```

Kemudian pada  ```MyClass.php``` kita tuliskan kode berikut.

```php
    <?php
    namespace App;

    class MyClass {
        public function sayHello() {
            echo "Hello from MyClass in MyNamespace!\n";
        }
    }
?>
```

```Autoload.php```

```php
<?php
    spl_autoload_register(function ($class) {
        // Convert nama kelas ke path file.
        $classPath = str_replace('\\', '/MyClass/', $class) . '.php';
        
        // Coba memuat file jika ada.
        if (file_exists($classPath)) {
            include $classPath;
        }
    });
?>
```
```index.php```

```php
<?php
    require 'App/Autoload.php';

    use App\MyClass;

    $namespace = new MyClass;
    $namespace->sayHello();

?>
```

Hal-hal yang perlu diperhatikan:

Dalam PSR-4 (PHP Standard Rekomendation), namespace harus mencerminkan struktur folder, dan autoload akan memuat kelas sesuai dengan namespace dan struktur folder yang sesuai. Oleh karena itu, pada kode yang kita buat diatas kita menuliskan untuk namespace adalah App karena berada pada struktur folder App, begitupun dengan autoload, ia tidak akan mengetahui jika namespacenya tidak sesuai dengan struktur folder. Dengan kata lain kita memerlukan satu autoload statis untuk setiap satu folder yang memuat class di dalamnya. 

Bagiamana untuk mengatasi hal tersebut? Kita memerlukan autoload global yang dapat membaca seluruh struktur folder pada website kita, hal ini dapat dilakukan dengan menggunakan composer.

### 3. Exception / Error Handling

Exception atau error handling dalam PHP adalah mekanisme yang memungkinkan Anda untuk mengelola dan menangani kesalahan atau pengecualian (exceptions) yang mungkin terjadi saat menjalankan kode PHP. Kesalahan atau pengecualian ini dapat muncul karena berbagai alasan, seperti kesalahan sintaksis, ketidakmampuan mengakses berkas, kesalahan dalam operasi basis data, dan banyak lagi.

PHP menyediakan sejumlah class bawaan yang digunakan untuk menangani pengecualian. Dua class utama yang terlibat dalam penanganan pengecualian adalah `Exception` (class dasar) dan class-class turunannya. Beberapa di antaranya adalah:

1. `Exception`: Ini adalah class dasar yang merupakan superclass dari semua pengecualian di PHP. Anda dapat juga membuat pengecualian kustom dengan menggantinya.

2. `RuntimeException`: Class ini digunakan untuk pengecualian yang biasanya muncul saat menjalankan kode.

3. `InvalidArgumentException`: Digunakan ketika argumen yang diteruskan ke suatu fungsi atau metode tidak sesuai.

4. `PDOException`: Digunakan untuk menangani pengecualian yang terkait dengan operasi basis data.

Untuk menangani pengecualian, Anda biasanya menggunakan blok `try` (untuk mencoba menjalankan kode yang mungkin memunculkan pengecualian) dan blok `catch` (untuk menangkap dan menangani pengecualian). Contohnya:

```php
<?php
//create function with an exception
function checkNum($number) {
  if($number>1) {
    throw new Exception("Value must be 1 or below");
  }
  return true;
}

//trigger exception in a "try" block
try {
  checkNum(2);
  //If the exception is thrown, this text will not be shown
  echo 'If you see this, the number is 1 or below';
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
```

Tugas:

Buat form input nama dan nim mahasiswa (tanpa database) dengan mengaplikasikan namespace dan autoload composer. Aplikasikan juga Exception/Error Handling ketika nim yang diinput kurang dari 8 angka (sesuai dengan nim ITK : 10201054).

Penambahan CSS akan menambah poin nilai

Kerjakan dengan menggunakan Markdown