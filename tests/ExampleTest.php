<?php 

class ExampleTest extends PHPUnit\Framework\TestCase {
    public function testTwoValusAreEqual() {
        include 'functions.php';
        $this->assertEquals( 4,  add(2,2) );
    }

    
}