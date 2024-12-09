<?php
// Kelas Induk
class Animal {
    public function makeSound() {
        return "Some sound";
    }
}

// Kelas Anak
class Dog extends Animal {
    public function makeSound() {
        return "Bark";
    }
}

// Menggunakan kelas
$myDog = new Dog();
echo $myDog->makeSound(); // Output: Bark
?>
