<script>
    function showConfirm(id)
    {
        var c = confirm("Are you sure to delete ?");
        if(c)
            {
                window.location= "postOverview.php?delete=" +id ;
            }
        
    }
    
    
</script>

    



<?php

require ("model/PostModel.php");

//this class will conatain all the functions which are not related to Database and they control model 
class PostController
{
    function CreatePostDropdownList()
    {   $PostModel = new PostModel;
        $valueArray= $PostModel->GetPostCategories();
       
        $result = "<form action='' method='post' width= '200px'>
            Please select a Category: 
            <select name='categories'>
            <option value='%'>All</option>".$this->CreateOptionValues($valueArray) . "</select> 
                <input class='submit' type='submit' name='submit' value='Search' />
                </form>";
        
        
        return $result;
        
    }
    function CreateOptionValues(array $valueArray)
    {
        $result="";
        foreach ($valueArray as $value) 
            {
             $result=$result."<option value='$value' > $value </option>";
            }
        return $result;
    
    }
    
    function CreatePosttable($category)
    {
        $PostModel= new PostModel;
        $PostArray= $PostModel->GetPostByCategory($category);
        $result="";
       
        foreach ($PostArray as $key => $value) 
            
        {
           




                      $result= $result.
                    '<div class="mu-from-blog-content">
              <div class="row">
              '.'
                <div class="col-md-4 col-sm-4">
                  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <a href="#"><img src="'. $value->image .'" alt="img"></a>
                      <figcaption class="mu-blog-caption">
                        <h3><a href="#">'. $value->title .' </a></h3>
                      </figcaption>                      
                    </figure>
                    <div class="mu-blog-meta">
                      <a href="#">By Admin</a>
                      <a href="#">02 June 2016</a>
                      <span><i class="fa fa-comments-o"></i>87</span>
                    </div>
                    <div class="mu-blog-description">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae ipsum non voluptatum eum repellendus quod aliquid. Vitae, dolorum voluptate quis repudiandae eos molestiae dolores enim.</p>
                      <a class="mu-read-more-btn" href="#">Read More</a>
                    </div>
                  </article>
                </div>
                '.'
              </div>
            </div>     ';
            
            
        }
        
        
        
        
        return $result;
        
    }
    
    function CreatePostOverviewTable()
    {
        $result="  
                         <table class='overViewTable'>
                         <tr>
                       <td>Update </td>
                       <td> Delete</td>
                       <td> <b> ID</b></td>
                       <td><b> TITLE</b> </td>
                       <td><b>CATEGORY</b> </td>
                       <td> <b>AUTHOR</b></td>
                       <td> <b>COUNTRY</b></td>
                       
                       

                         </tr>
                         





                 ";
    $postArray = $this->GetPostByCategory("%");
    
    foreach ($postArray as $key => $value)
    {
        $result=$result."  
              <tr>
                       <td><a href='postadd.php?update=$value->id'>Update</a> </td>
                       <td> <a href='#' onclick='showConfirm($value->id)'>Delete</a> </td>
                       <td> $value->id</td>
                       <td> $value->title </td>
                       <td> $value->category</b> </td>
                       <td>  $value->author</b></td>
                       <td>  $value->roast</b></td>
                    
                       

                         </tr>






                ";
        
    }
        
        
        $result = $result. "</table>";
        return $result;
    }
    
    function GetImages ()
    {
        //select Folder to scan
        $handle = opendir("images");
        
        //Read all files and store their Name in an Array
        while($image = readdir($handle))
        {
            $images[]=$image;
            
        }
        closedir($handle);
       // Exclude all filename having lenght < 3
         $imageArray = array() ;
       foreach ($images as $image)
       {
          if (strlen($image) > 2)
          {
              array_push ($imageArray, $image);
          }
       }
       
       //creating <select><option> values and returning result
       $result=  $this->CreateOptionValues($imageArray);
       return $result;
        
        
    }
    
    function InsertPost()
    { 
         $title= $_POST["txtTitle"];
        $category = $_POST["ddlCategory"];
        $author= $_POST["txtAuthor"];
        $image= $_POST["ddlImage"];
        $roast= $_POST["txtRoast"];
        $content= $_POST["txtContent"];
        
        $post = new PostEntity(-1, $title, $category, $author, $image, $roast, $content);
       
       
      $PostModel = new PostModel;
       $PostModel->InsertPost($post);
        
        
        
    }
    
    function UpdatePost($id)
    {
        $title= $_POST["txtTitle"];
        $category = $_POST["ddlCategory"];
        $author= $_POST["txtAuthor"];
        $image= $_POST["ddlImage"];
        $roast= $_POST["txtRoast"];
        $content= $_POST["txtContent"];
        
        $post = new PostEntity(-1, $title, $category, $author, $image, $roast, $content);
       
       
      $PostModel = new PostModel;
       $PostModel->UpdatePost($id, $post);
        
    }
    
    function DeletePost($id)
    {
        $PostModel = new PostModel;
       $PostModel->DeletePost($id);
        
    }
    

    function GetPostById($id)
    {
      $postModel = new PostModel;
      return $postModel->GetPostById($id);
        
    }
    
    function GetPostByCategory($category)
    {
      $postModel = new PostModel;
     return  $postModel->GetPostByCategory($category);
      
    }
    
    function GetPostCategories()
    {
        $postModel = new PostModel;
        return $postModel->GetPostCategories();
        
    }

    
   
}

?>
