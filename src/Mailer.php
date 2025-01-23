<?php 

class Mailer {
    
    /**
     * Send a message
     * @param string $email
     * @param string $message
     * @return boolean true if send, false otherwise
     */
    public function sendMessage( string $email, string $message ) {
        
        // use mail or PHPMailer for example
        sleep(3);
        echo "Send '$message' to '$email' \n";
        return true;
    }
}