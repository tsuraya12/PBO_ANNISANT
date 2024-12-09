<?php
class Animal {
    public function speak() {
        echo "Animal speaks<br>";
    }
}

class Mammal extends Animal {
    public function feedMilk() {
        echo "Feeding milk<br>";
    }
}

trait BirdTrait {
    public function layEggs() {
        echo "Laying eggs<br>";
    }
}

class Platypus extends Mammal {
    use BirdTrait;  // Platypus combines Mammal class and BirdTrait trait

    public function uniqueFeature() {
        echo "I am a mammal that lays eggs!<br>";
    }
}

$platypus = new Platypus();
$platypus->speak();         // Output: Animal speaks
$platypus->feedMilk();      // Output: Feeding milk
$platypus->layEggs();       // Output: Laying eggs
$platypus->uniqueFeature(); // Output: I am a mammal that lays eggs!
?>