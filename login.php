<?php
require 'Controller/UserController.php';
$userController = new UserController;
$content="";
if(isset($_POST["submit"]))
    {
    	$content="<p class='error'> ";

    	$errors=$userController->LoginUser();
        foreach ($errors as $error ) 
        {
        	$content=$content.$error.'<br/>';
        }

        $content=$content."</p>";
    }


$title="User Login";
$content=$content.' <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Login Page</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">login</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
<section id="mu-course-content">
   <div class="container">
 <!-- Start contact  -->
 <section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Login to your account</h2>
            <p>Give credentials!</p>
          </div>
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                  <form class="contactform" method="post" action="">                  
                    
                    <p class="comment-form-url">
                      <label for="subject">Username</label>
                      <input type="text"  required="required"  name="txtUsername">  
                    </p>
                    <p class="comment-form-url">
                      <label for="subject">Password</label>
                      <input type="password"  required="required"  name="txtPassword">  
                    </p>
                            
                    <p class="form-submit">
                      <input name="submit"  value="Login" class="mu-post-btn" type="submit">
                    </p>
                    <p class="form-submit">
                      <input name="reset"  value="Reset" class="mu-post-btn" type="reset">
                    </p>        
                  </form>
                </div>
              </div>
             
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End contact  -->
 </div>
 </section>

			
		';


include 'master.php';
?>

