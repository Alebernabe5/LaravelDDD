<?php

namespace Src\admin\user\domain\value_objects;

use GuzzleHttp\Psr7\Message;

class UserName {

     private string $name;
    
    public function __construct(string $name)
    {
        if(strlen($name<3)){
            throw new('User name must be at least 3 characters');
        }
        $this->name = $name;
        
    }

    public function value():string
    {
        return  $this->name;
    }

}