<?php 

require ('./model/UserModel.php');

class UserController
{
	
	function RegisterUser()
	{
		$errors = array();
		
		$name= $_POST["txtName"];
        $username = $_POST["txtUsername"];
        $email= $_POST["txtEmail"];
        $pwd= $_POST["txtPassword"];
        $c_pwd= $_POST["txtCPassword"];
        
        if(empty($username))
        {
        	array_push($errors,"Username is required");
        }
        if(empty($name))
        {
        	array_push($errors,"Name is required");
        }
        if(empty($email))
        {
        	array_push($errors,"Email is required");
        }
        if(empty($pwd))
        {
        	array_push($errors,"Password  is required");
        }
        if($pwd != $c_pwd)
        {
        	array_push($errors,"The two passwords do not match ");
        }
        if(count($errors)==0)
        {
        	$user = new UserEntity(-1, $name, $username, $email, $pwd);
	        $userModel = new UserModel;
	        $userModel->RegisterUser($user);
	        array_push($errors,"Successfully registered!");
	        return $errors;
        }

        return $errors;


        
	}



        function LoginUser()
        {
                $errors = array();
                
             
        $username = $_POST["txtUsername"];
        
        $pwd= $_POST["txtPassword"];
       
        
        if(empty($username))
        {
                array_push($errors,"Username is required");
        }
        
        
        if(empty($pwd))
        {
                array_push($errors,"Password  is required");
        }
        
        if(count($errors)==0)
        {      


        session_start();
        
        mysql_connect("localhost", "root","")
        or die(mysql_error()); //Connect to server
        mysql_select_db("webmania") or die("Cannot connect to database"); //Connect to database
        $query = mysql_query("SELECT * from users WHERE username='$username'");
        //Query the users table if there are matching rows equal to $username
        $exists = mysql_num_rows($query);
        //Checks if username exists
        $table_users = "";
        $table_password = "";
        if($exists > 0) //IF there are no returning rows or no existing username
        {
        while($row = mysql_fetch_assoc($query)) //display all rows from query
        {
        $table_users = $row['username'];
        // the first username row is passed on to $table_users, and so on until the query is finished 
        $table_password = $row['pwd']; // the first password row is passed on to $table_users, 
        }
        if(($username == $table_users) && ($pwd == $table_password))
        // checks if there are any matching fields
        {
        if($pwd == $table_password)
        {
        $_SESSION['username'] = $username; //set the username in a session.
        header("location: index.php"); // redirects the user to the authenticated home page
        }
        }
        else
        {
        Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php


        }
        }
        else
                {
        Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
                } 






               
        }

        return $errors;


        
        }
	
}





 ?>