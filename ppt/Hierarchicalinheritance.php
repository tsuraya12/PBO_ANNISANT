<?php
class Animal {
    public function speak() {
        echo "Animal speaks<br>";
    }
}

class Dog extends Animal {  // Dog inherits from Animal
    public function bark() {
        echo "Woof! Woof!<br>";
    }
}

class Cat extends Animal {  // Cat also inherits from Animal
    public function meow() {
        echo "Meow! Meow!<br>";
    }
}

$dog = new Dog();
$cat = new Cat();
$dog->speak();  // Output: Animal speaks
$dog->bark();   // Output: Woof! Woof!
$cat->speak();  // Output: Animal speaks
$cat->meow();   // Output: Meow! Meow!
?>
