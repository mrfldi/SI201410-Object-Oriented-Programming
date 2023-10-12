# Praktikum 8 : Object Oriented Programming
---

Metode pemrograman yang berorientasi pada objek. Terdapat kelas dan object yang dapat berinteraksi satu sama lain sehingga tercipta suatu program.

<div style="text-align:center;">
    <img src="img/dog-oop.jpg" alt="Nature" width="70%" height="50%">
</div>

- Class : blueprint atwau template untuk membuat objek dan digunakan untuk menentukan prilaku objek tersebut.
- Object : benda yang memiliki data dan perilaku tertentu.
- Method : fungsi yang dialokasikan dengan suatu objek dan digunakan untuk menentukan perilaku objek tersebut.
- Atribute : variabel yang dikaitkan dengan suatu objek dan digunakan untuk merepresentasikan keadaan objek itu.

## Konsep Dasar OOP
### 1. Encapsulation
Encapsulation adalah salah satu konsep dasar OOP yang menyembunyikan detail suatu objek dari akses luar. Encapsulation membantu dalam menciptakan kode yang lebih aman dengan mencegah modifikasi data yang tidak disengaja.
```php
    <?php
    Class Person { // This is Class
        public $name; // This is Atribute
        public $age;
    
        public function greet() // This is Method
        {
            return "Hello, my name is ".$this->name . " and my age is " . $this->age;
        }
    }
    
    $person1 = new Person();
    $person1->name = "Budi";
    $person1->age = 20;
    echo $person1->greet();
    ?>
```
```
Hello, my name is Budi and my age is 20
```

### 2. Inheritance
Inheritance adalah mekanisme dalam OOP yang memungkinkan suatu objek mewarisi properti dan metode dari objek induknya. Inheritance memungkinkan terciptanya hubungan antara objek yang memiliki karakteristik dan perilaku yang sama. 

Dengan mengatur objek ke dalam subkelas berdasarkan karakteristik yang sama, seorang programmer dapat membuat basis kode yang dapat digunakan berulang kali.
```php
<?php
    class Animal {
        public function sound() {
            return "Animal sound";
        }
    }

    class Dog extends Animal {
        public function sound() {
            return "Bark";
        }
    }

    $animal = new Animal();
    echo $animal->sound();  // Output: Animal sound

    $dog = new Dog();
    echo $dog->sound();     // Output: Bark


?>
```

### 3. Polymorphism
Polymorphism merupakan kemampuan objek untuk mengambil bentuk yang berbeda atau memiliki banyak perilaku, tergantung pada konteks penggunaannya. Polymorphism memfasilitasi pemrograman yang lebih fleksibel, karena objek dapat digunakan dalam berbagai konteks berbeda sambil tetap berperilaku yang sesuai.

### 3. Abstraction
Abstraction adalah praktik menyederhanakan sistem yang kompleks dengan memecahnya menjadi bagian-bagian yang lebih kecil dan lebih mudah dikelola. Dengan meringkas detail dari sebuah objek, seorang programmer dapat menyederhanakan suatu desain program. 

### Tugas
Membuat OOP PHP dengan menggunakan Inheritance.
Objective dari program : Menampilkan 2 data Mahasiswa.
Atribute : 4 -> Nama, Nim, Prodi, dan Jurusan.
Inheritence : 
Class 1 -> Nama, Nim
Class 2 (Extends Class) -> Prodi, Jurusan

Fromat tugasnya = Markdown.