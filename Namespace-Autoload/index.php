<?php
    require 'vendor/autoload.php';

    use MyClass\MyClass;
    use AnotherClass\AnotherClass;

    $namespace = new MyClass;
    $namespace_2 = new AnotherClass;

    $namespace->sayHello();
    $namespace_2->sayHello();

?>