<?php 

class UserTest extends PHPUnit\Framework\TestCase {
    
    public function testReturnsFullName() {
        // include '../src/User.php';
        
        $user = new User( 'Hasan', 'Hafiz' );
        $this->assertEquals("Hasan Hafiz", $user->getFullName() );
    }

    public function testEmptyReturnIfNameIsNotProvided() {
        // include '../src/User.php';
        
        $user = new User( '', '' );
        $this->assertEquals("", $user->getFullName() );        
    }
    
    
    public function testNotificationIsSend() {
        // $user = new User('Hasan', 'Hafiz');
        // $user->email = 'hasan.dev@gmail.com';
        // $result = $user->notify( "Hello" );
        
        // $this->assertTrue( true, $result );
        
        // use mock instead above test
        $mock_mailer = $this->createMock( Mailer::class );
        
        // stub method
        $mock_mailer->expects( $this->once() )
                ->method('sendMessage')
                ->with( $this->equalTo('hasanhafiz@gmail.com'), $this->equalTo('Hello') )
                ->willReturn(true);
        
        
        $user = new User('Hasan', 'Hafiz');
        $user->email = 'hasanhafiz@gmail.com';
        // $user->setMailer( new Mailer );
        $user->setMailer( $mock_mailer );
        
        $result = $user->notify( "Hello" );        
        $this->assertTrue( $result );
    }
}