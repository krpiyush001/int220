<?php
$title= "Upload image ";
$content = '<form action="" method="post" enctype="multipart/form-data" >
    
    <label for="file"> Filename : </label>
    <input type="file"  name="file" id="file"/> <br/>
    <input type="submit" name="submit" value="Upload"/>
    
</form>    ';


//check file type is valid format or not 

if (isset($_POST["submit"]))
    {
$fileType= $_FILES["file"]["type"];

if(($fileType == "image/gif") ||
    ($fileType == "image/jgp") ||
    ($fileType == "image/jpeg") ||
    ($fileType == "image/png") )
{
    //check if file exixts
    if(file_exists("images/".$_FILES["file"]["type"]))
    {
        echo "File already exists!";
    }
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$_FILES["file"]["name"]);
        echo "Uploaded in images/".$_FILES["file"]["name"];
        
    }   
}
}





include 'master.php';

?>


       
 
    
    
    