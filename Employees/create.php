<html>
   
<?php 
include('../scripts.php');
include("../navbar.php");
include("../db.php");
?>

    <div class="container-fluid mt-3">
        <div class="card border-top-success ">
            <div style=" letter-spacing: 0.1em;" class="card-header  text-success text-uppercase"><h4> Employee - Create</h4> </div>
        </div>
            <div class="row mt-3" >
                <div class="col-lg-9">
                    <div class="card border-left-success">
                    <h6 style=" letter-spacing: 0.1em;" class="card-header text-success text-uppercase"> Personal Information </h6>

                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                                <input type="text" class="form-control " name="firstname" id="firstname" placeholder="Enter Firstname" required>
                                <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Middlename (optional)">
                                <input type="text" class="form-control required" name="lastname" id="lastname" placeholder="Enter Lastname">
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label style="letter-spacing: 0.1em" class="text-uppercase">Address:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control required" name="address" id="address" placeholder="Enter Address" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label style="letter-spacing: 0.1em" class="text-uppercase">Email Address:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                         <input type="text" class="form-control required" name="email" id="email" placeholder="Enter Email" required="">
                                    </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label style="letter-spacing: 0.1em" class="text-uppercase">Username:</label>
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                         <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control required" name="username" id="username" placeholder="Enter Username">
                            </div>
                        </div>
                            <div class="col-md-6">
                                <label style="letter-spacing: 0.1em" class="text-uppercase">Contact Number:</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control required" name="contact" id="contact" placeholder="Enter Contact Number">
                            </div>
                        </div>


                </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label style="letter-spacing: 0.1em" class="text-uppercase">Password:  <small id="passwordHelpInline" class="text-muted">
                    (Must be atleast 6 characters long)
                     </small></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control required" name="password" id="password" placeholder="Enter Password">
                    </div>
                </div>
                <div class="col-md-6">
                    <label style="letter-spacing: 0.1em" class="text-uppercase">Confirm Password:  </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control required" name="confirm_pass" id="confirm_pass" placeholder="Enter Contact Number">
                    </div>
                </div>
            </div>
                    </div>



                    </div>
                </div>

<!-- For Image -->
                <div class="col-lg-3">
                    <div class="card border-right-success justify-content-center">
                         <div class="card-body">
                            <img id="pic" width="78%" height="80%" src="../Content/Images/default.png" class="img-thumbnail mt-3" alt="Your Image" />
                            <div class="row">
                            <div class="col-xs-6 justify-content-center">
                            <input type='file' id="file" name="file" class="mt-3 " disabled />
                            </div>
                        </div>
                    </div>
                       
                </div>

                </div>

<!-- First Row -->
</div>

<div class="card border-left-success mt-3">
    <div style=" letter-spacing: 0.1em;" class="card-header text-success text-uppercase"> <h6>Assign User</h6></div>
    <div class="card-body">

        <div class="row">
        
         
            <div class="col-md-4">            
                <label style="letter-spacing: 0.1em" class="text-uppercase">Role: <small id="passwordHelpInline" class="text-muted">
                    (Assign role for this user)
                    </small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-users" aria-hidden="true"></i></span>
                            </div>
                            <?php 
                             include('../db.php');
                             $query = "SELECT * FROM roles where isActive= 1";
                             $result = mysqli_query($conn,$query);
                            ?>
                            <select class="form-control required" id="role" name="role">
                                <option value="0"> Select Role</option>
                                <?php 
                                while($list = mysqli_fetch_array($result))
                                {
                                ?>
                                    <option value="<?php echo $list['RoleId']; ?>"><?php echo $list['RoleName']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
               </div> 
        
        
        
            </div> 
            <div class="col-md-4">            
                <label style="letter-spacing: 0.1em" class="text-uppercase">Department: <small id="passwordHelpInline" class="text-muted">
                    (Assign role for this user)
                    </small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-users" aria-hidden="true"></i></span>
                            </div>
                            <?php                            
                             $querydept = "SELECT * FROM deparments WHERE isActive= 1";
                             $resultdept = mysqli_query($conn,$querydept);
                            ?>
                            <select class="form-control " id="dept" name="dept">
                                <option value="0"> Select Department</option>
                                <?php 
                                while($lists = mysqli_fetch_array($resultdept))
                                {
                                ?>
                                    <option value="<?php echo $lists['department_id']; ?>"><?php echo $lists['department_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
               </div> 
        
        
        
            </div> 
            <div class="col-md-4">
                 <label style="letter-spacing: 0.1em" class="text-uppercase">Employment Status: </label>
                <select class="form-control">
                    <option> Select Value</option>
                </select>
            </div>
            
           
            </div>
        </div>

    </div>

<div class="card-footer border-top-success mt-3">
          <div class="row justify-content-end">                      
            <button class="btn btn-primary col-xs-3 ml-5" id="add_user"><i class="fa fa-save" aria-hidden="true"></i> Save User</button>            
            <button class="btn btn-danger col-xs-3 ml-3" id="cancel"><i class="fa fa-window-close" aria-hidden="true"></i> Cancel</button>
            <!-- <button class="btn btn-default col-xs-3 ml-3" id="cancel"> Back To Home</button> -->
          </div>     
        </div>
                
            </div>
        
        </div>
        </div>
</html>




<script>

                                
    $("#role").change(function(){
        var deptid = $(this).val();
       
            $.ajax({
            url: 'fetchDept.php',
            type: 'POST',
            data : {deptart: deptid},
            dataType: 'json',
            success : function(data){
                var len = data.length;
                $("#dept").empty();                
                for( var i = 0; i<len; i++){
                    var id = data[i]['department_id'];
                    var name = data[i]['department_name'];                    
                    $("#dept").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
         });
  


 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#pic').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#file").change(function(){
        readURL(this);
    });

$("#add_user").click(function(){
var firstname = $.trim($("#firstname").val());
var middlename = $.trim($("#middlename").val());
var lastname =$.trim($("#lastname").val());
var address =$.trim($("#address").val());
var email =$.trim($("#email").val());
var username = $.trim($("#username").val());
var contact =$.trim($("#contact").val());
var password =$.trim($("#password").val());
var confirm_pass =$.trim($("#confirm_pass").val());
var pic = $('#file').val();
var dept =$('#dept').val();
var role =$('#role').val();
// var fd = new FormData();
// var files = $('#file')[0].files;
// var usertype= $.trim($("#usertype").val());

if(role=="" || firstname == "" || lastname=="" || address=="" || email=="" || username=="" || contact==""|| password ==""||confirm_pass=="" )
{
    Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: 'Please enter required field/s!',

        showConfirmButton: false
    });
}

else if( password != confirm_pass)
{
        Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: 'Password confirmation are different!',

        showConfirmButton: false
    });
}
else
{
    Swal.fire({
        title: 'Are you want to add this?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1cc88a',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
  if (result.isConfirmed) {
    var action="addUser";
    $.ajax({
            url: 'action.php',
            type: 'POST',
            data : {
                action: action,
                firstname:firstname,
                middlename: middlename,
                lastname:lastname,
                address:address,
                email:email,
                username:username,
                contact:contact,
                password:password,
                dept: dept,
                role:role
                },
            dataType: 'json',
            success : function(data){
                
                Swal.fire({
                 icon: 'success',
                 title: 'Congratulations',
                 text: data
                });
                window.location.href = "../Employees/";

            }
        });



  
  }
});


}




});

</script>