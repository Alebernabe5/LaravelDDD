<?php

namespace Src\admin\user\domain\value_objects;

use GuzzleHttp\Psr7\Message;

class UserEmail {

     private string $email;
    
    public function __construct(string $email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new('Invalid email format');
        }
        $this->email = $email;
        
    }

    public function value():string
    {
        return  $this->email;
    }

}