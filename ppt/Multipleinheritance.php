<?php
trait Flyable {
    public function fly() {
        echo "Flying<br>";
    }
}

trait Swimmable {
    public function swim() {
        echo "Swimming<br>";
    }
}

class Duck {
    use Flyable, Swimmable;  // Duck inherits from both Flyable and Swimmable using traits
}

$duck = new Duck();
$duck->fly();   // Output: Flying
$duck->swim();  // Output: Swimming
?>
