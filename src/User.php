<?php 

class User {
    
    public string $email;
    
    protected $mailer;
    
    public function __construct(private string $firstname, private string $lastname)
    {
        
    }
    
    public function setMailer( Mailer $mailer ){
        $this->mailer = $mailer;
    }
    
    public function getFullName() {
        return trim( "{$this->firstname} {$this->lastname}" );
    }
    
    public function notify( $message ) {
        
        return $this->mailer->sendMessage( $this->email, $message );
        // return true; // Just return is also work. But we can tell php unit that, this should not work when assigning mock method
    }
    
}