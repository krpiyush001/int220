<?php
require ("entities/UserEntity.php");

//contain database related codes for users 

class UserModel 
{
    function  RegisterUser(UserEntity $user)
    {
    	$query= sprintf("INSERT INTO users
                        (name , username ,email , pwd )
                        VALUES
                        ('%s','%s','%s','%s')",
	 			   mysql_real_escape_string($user->name),
	               mysql_real_escape_string($user->username),
	               mysql_real_escape_string($user->email),
	               mysql_real_escape_string($user->pwd)
	               
               
               
               );

    	$this->PerformQuery($query);
        
    }

    function PerformQuery($query)
    {
        require 'credentials.php';
        //connection to database 
        mysql_connect($host,$user,$password) or die(mysql_error());
        //select database
        mysql_select_db($database) ; 
        //Perform Query
        mysql_query($query) or die(mysql_error());
    }
    
}

?>
