<?php
require ("entities/PostEntity.php");

//contain database related codes for post page
class PostModel
{   // Get all the post categories from the database and return them in an array 
    function GetPostCategories()
    {
        require 'credentials.php';
        //connection to database 
        mysql_connect($host,$user,$password) or die(mysql_error());
        //select database
        mysql_select_db($database) ; 
        $query="SELECT DISTINCT category FROM post";
        $result=  mysql_query($query) or die(mysql_error());
        $categories = array();
        
        
        //get data form database
       while ($row = mysql_fetch_array($result)) 
       {
           array_push($categories, $row[0]);
           
       }
       //close connection and return result
       mysql_close();
       return $categories;
    } 
    // Get all the post entity  from the database of particular category  and return them in an array
    function GetPostByCategory($category)
    {
        require 'credentials.php';
        //connection to database 
        mysql_connect($host,$user,$password) or die(mysql_error());
        //select database
        mysql_select_db($database) ; 
        $query="SELECT *  FROM post WHERE category LIKE '$category'";
        $result=  mysql_query($query) or die(mysql_error());
        $PostArray = array();
        //get data form database
        while ($row = mysql_fetch_array($result)) 
       {   $id = $row[0];
           $title=$row[1];
           $category=$row[2];
           $author=$row[3];
           $image=$row[4];
           $roast=$row[5];
           $content=$row[6];
           
           $post = new PostEntity($id,$title,$category,$author,$image,$roast,$content);
           array_push($PostArray, $post);
           
           
       }
       //close connection and return result
       mysql_close();
       return $PostArray;
         
    }
    // Get a post entity  from the database and return that.
    function GetPostById($id)
    {
        require 'credentials.php';
        //connection to database 
        mysql_connect($host,$user,$password) or die(mysql_error());
        //select database
        mysql_select_db($database) ; 
        $query="SELECT *  FROM post WHERE id = $id ";
        $result=  mysql_query($query) or die(mysql_error());
       
        //get data form database
        while ($row = mysql_fetch_array($result)) 
       {   $title=$row[1];
           $category=$row[2];
           $author=$row[3];
           $image=$row[4];
           $roast=$row[5];
           $content=$row[6];
           
           $post = new PostEntity($id,$title,$category,$author,$image,$roast,$content);
          
           
           
       }
       //close connection and return result
       mysql_close();
       return $post;
        
    }
    function InsertPost(PostEntity $post)
    {
       $query= sprintf("INSERT INTO post
                        (title,category,author , image , roast , content)
                        VALUES
                        ('%s','%s','%s','%s','%s','%s')",
 mysql_real_escape_string($post->title),
               mysql_real_escape_string($post->category),
               mysql_real_escape_string($post->author),
               mysql_real_escape_string("images/".$post->image),
               mysql_real_escape_string($post->roast),
               mysql_real_escape_string($post->content)
               
               
               );
       
       $this->PerformQuery($query);
       
       
    }
    function UpdatePost($id , PostEntity $post )
    {
       $query= sprintf("UPDATE post
                          SET title = '%s',
                              category = '%s',
                              author = '%s', 
                              image = '%s',
                              roast = '%s',
                              content = '%s'
                       WHERE  id= $id       
" ,   mysql_real_escape_string($post->title),
               mysql_real_escape_string($post->category),
               mysql_real_escape_string($post->author),
               mysql_real_escape_string("images/".$post->image),
               mysql_real_escape_string($post->roast),
               mysql_real_escape_string($post->content)
              );
       $this->PerformQuery($query);
        
    }
    function DeletePost($id)
    {
       $query= "DELETE FROM post WHERE id = $id";
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
