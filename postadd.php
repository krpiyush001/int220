<?php
require 'Controller/PostController.php';
$postController = new PostController;

if(isset($_GET["update"]))
{  $post =  $postController->GetPostById($_GET["update"]);
    $content="
<form action='' method='post'>
    <fieldset> 
        <legend allign='center'> UPDTAE  </legend>
        <label for='title'> Title : </label>
        <input type='text' class='inputField' value='$post->title' name='txtTitle' /> </br>
        
        <label for='category'>Category : </label>
        <select name='ddlCategory' class='inputField'>
            <option value='%'> All </option>".$postController->CreateOptionValues($postController->GetPostCategories())."
            
        </select> </br>
        
        <label for='author'> Author : </label>
        <input type='text' value='$post->author' class='inputField' name='txtAuthor'/> </br>
        
        <label for='Image'> Image : </label>
        <select name='ddlImage' class='inputField'>
            ".$postController->GetImages()."
            
        </select> </br>
        
        <label for='Country'> Country : </label>
        <input type='text' value='$post->roast' name='txtRoast' class='inputField'/> <br>
        
        <label for='Content'> Content : </label>
        <textarea name='txtContent' cols='70' rows='12'> $post->content </textarea><br>
        
        
        <input type='submit' value='Submit'/> 
    </fieldset>
</form>    
        



        ";
}
 else {
    
 {
     $content="
<form action='' method='post'>
    <fieldset> 
        <legend> Add a new POST </legend>
        <label for='title'> Title : </label>
        <input type='text' class='inputField' name='txtTitle' /> </br>
        
        <label for='category'>Category : </label>
        <select name='ddlCategory' class='inputField'>
            <option value='%'> All </option>".$postController->CreateOptionValues($postController->GetPostCategories())."
            
        </select> </br>
        
        <label for='author'> Author : </label>
        <input type='text' class='inputField' name='txtAuthor'/> </br>
        
        <label for='Image'> Image : </label>
        <select name='ddlImage' class='inputField'>
            ".$postController->GetImages()."
            
        </select> </br>
        
        <label for='Country'> Country : </label>
        <input type='text' name='txtRoast' class='inputField'/> <br>
        
        <label for='Content'> Content : </label>
        <textarea name='txtContent' cols='70' rows='12'> </textarea><br>
        
        
        <input type='submit' value='Submit'/> 
    </fieldset>
</form>    
        



        ";
 }
     
 }





$title="Add a new post";
if(isset($_GET["update"]))
{
    if(isset($_POST["txtTitle"]))
    { $postController->UpdatePost($_GET["update"]);
    }
}
else
{
    if(isset($_POST["txtTitle"]))
    { $postController->InsertPost();
    }
}

include 'master.php';


?>

