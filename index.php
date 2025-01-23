<?php 

require "vendor/autoload.php";

$user = new User('Hasan', 'Hafiz');

echo $user->getFullName();