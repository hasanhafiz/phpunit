<?php 


class MockTest extends PHPUnit\Framework\TestCase { 
    public function testMock() {
        // $mailer = new Mailer;
        
        $mock = $this->createMock( Mailer::class );
        
        $mock->method('sendMessage')
            ->willReturn(true);
        
        // $result = $mailer->sendMessage( 'hasan@gmail.com', "Hello Hasan" );
        $result = $mock->sendMessage( 'hasan@gmail.com', "Hello Hasan" );
        
        $this->assertTrue( $result );
        // var_dump( $result );
    }
}