<?php

class UserEntity 
{
    public $id;
    public $name;
    public $username;
    public $email;
    public $pwd;
  
    function __construct($id, $name, $username, $email, $pwd)
     {
        $this->id= $id;
        $this->name= $name;
        $this->username= $username; 
        $this->email= $email;
        $this->pwd= $pwd;
     
     }   
    
}

?>
