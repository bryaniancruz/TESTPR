<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Styles/bootstrap.min.css">
    <script src ="Scripts/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="Styles/border.css"> 
    <script src ="Scripts/popper.min.js"></script>
    <script src ="Scripts/bootstrap.min.js"></script>
    <script src ="Scripts/sweetalert.js"></script>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    
    <title>Purchase Tracking System</title>
  </head>
 <body style="background-image: url('Content/Images/asd.jpg');  background-size:cover;background-repeat:no-repeat;">  
  
 <?php
//  include('navbar.php') ;
 ?>

  <div class="container">  
      <div class="row">
          <!-- Left Container -->
          <div class="col-md-7">
          <!-- <img class="theimage" src="Content/Images/25.gif" alt=""/> -->
          </div>
          <!-- Right Container -->
          <div class="col-md-5" style="margin-top: 90px;">
           <div class="card">         
                <div class="card-header"><center><h3 style=" letter-spacing: 0.1em; text-transform: uppercase;  ">LOGIN FORM</h3></center> </div>
                <div class="card-body">
                      <label style=" letter-spacing: 0.1em; text-transform: uppercase;">Username or Email Address</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                          </div>
                            <input type="text" class="form-control " name="username" id="username" placeholder="Enter Email or Username">
                      </div>
                      <br />
                      <label style=" letter-spacing: 0.1em; text-transform: uppercase;">Password</label>

                      <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                           </div>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                      </div>   
                     </div>
                      <!-- <input class="form-control" placeholder=" Enter Username or Email Address" > -->
                      <br />  
              
                      <div class="card-footer">  
                          <button id="btnLogin" type="button" class="btn btn-primary col-md-12">Login</button>
                          <!-- <p class="mt-3" style="text-align:center;"> <label style=" letter-spacing: 0.1em; text-transform: uppercase;">Not Registered? <a data-toggle="modal" data-target="#registerModal" href="" id="register"> Click Here</a></label></p>  -->
                      </div>                  
                      </div>
                 
              </div>
          </div>
      </div>
  </div>

  
         
        </div>

    </div>    
      
  </div>

      
  </body>
  </div>
</html>

<script>
// $("#register").click(function(){
// swal.fire("Click");
// });
$(".navbar .nav-item").on("click", function(){
   $(".navbar").find(".active").removeClass("active");
   $(this).addClass("active");
});
$("#btnLogin").click(function()
  {
    var action="login";
    var username =$('#username').val();
    var password=$('#password').val();

    $.ajax({
            url: 'action.php',
            type: 'POST',
            data :{
              action: action,
              username: username,
              password:password
              },
            dataType: 'json',
            success : function(data){
              if(data.message == 1){
                Swal.fire({
                 icon: 'warning',
                 title: 'Sorry!',
                 text: data.text
                });
              }
               else if(data.message == 2){
                  Swal.fire({
                 icon: 'warning',
                 title: 'Sorry!',
                 text: data.text
                });
                }
                else if (data.message == 3){
                  Swal.fire({
                 icon: 'error',
                 title: 'Sorry!',
                 text: data.text
                });
                }
                else{
                Swal.fire({
                 icon: 'success',
                 title: 'Welcome',
                 text: data.message,
                 timer: 3500
                });
                window.location.href =data.role+'/';
                }

            }
        });
   
  });
</script>