<?php
require ("controller/PostController.php");
$PostController = new PostController;

if(isset($_POST['categories']))
{  // fill page with posts of selected category
    $PostTable= $PostController->CreatePosttable($_POST['categories']);
}
else {
    // fill page with all categories because page is loaded first time
    $PostTable= $PostController->CreatePosttable('%');
}

$title ="Blog Page";
//$content =$PostController->CreatePostDropdownList().$PostTable;

$content =' <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Blog Archive</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Blog Archive</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <!-- Start from blog -->
  <section id="mu-from-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-from-blog-area">
            <!-- start title -->
            <div class="mu-title">
              <h2>From Blog</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum vitae quae vero ut natus. Dolore!</p>
            </div>
            <!-- end title -->  
            <!-- start from blog content   -->
            '.$PostController->CreatePostDropdownList().$PostTable.'
            <!-- end from blog content   -->   
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End from blog -->
   </div>
 </section> ';



include 'master.php';
?>
