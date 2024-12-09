<?php
class Animal {
    public function speak() {
        echo "Animal speaks<br>";
    }
}

class Mammal extends Animal {  // Mammal inherits from Animal
    public function feedMilk() {
        echo "Feeding milk<br>";
    }
}

class Dog extends Mammal {  // Dog inherits from Mammal, which inherits from Animal
    public function bark() {
        echo "Woof! Woof!<br>";
    }
}

$dog = new Dog();
$dog->speak();     // Output: Animal speaks
$dog->feedMilk();  // Output: Feeding milk
$dog->bark();      // Output: Woof! Woof!
?>
