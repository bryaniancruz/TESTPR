<?php 
session_start();
include("db.php");


if(!isset($_SESSION['fullname'])){
  header("location: ../");
   exit();
}

?>
<nav style="background-color:#070d59;" id="logo" class="navbar navbar-expand-lg scrolling-navbar  navbar-dark ">
  <!-- <a class="navbar-brand "  href="/PR/">
    <img src="../Content/Images/lx.png" class="img-responsive" width="30" height="30" alt="">
  </a> -->
      <ul class="navbar-nav ">
         <li class="nav-item active">
          <a class="nav-link text-white" href="#" style="letter-spacing: 0.1em; text-transform: uppercase;">Inventory Tracking System</a>
         </li>             

      </ul>    
 
</nav>

<nav style="background-color:#1a1c20;" id="toolbar" class=" navbar navbar-expand-sm  navbar-dark  ">
  <!-- <a class="navbar-brand " href="#">
    <img src="Content/Images/lo.png" width="30" height="30" alt="">
  </a> -->
  <ul class="navbar-nav  ">
  <?php 
  if($_SESSION['role'] == "Admin"){
?>
<li class="nav-item">           
          <a class="nav-link text-uppercase text-white"  href="../<?php echo $_SESSION['role']; ?>/">Home</a>     
         </li>
         <?php                            
          $querynav = "SELECT * FROM parentmodules WHERE isActive= 1";
          $resultnav = mysqli_query($conn,$querynav);        
          ?>
           <?php 
            while($lists = mysqli_fetch_array($resultnav))
              {
          ?>        
         <li class="nav-item dropdown">      
         <a class="nav-link dropdown-toggle text-uppercase text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $lists['ParentModule_name']; ?>
        </a>
        <?php 
        $querychild = "SELECT * FROM childmodules WHERE parentModule_id = '".$lists['ParentModule_id']."' and isActive= 1";
        $resultchild = mysqli_query($conn,$querychild);
        ?>
        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
        <?php 
            while($listchild = mysqli_fetch_array($resultchild))
              {
                ?>
          <a class="dropdown-item text-uppercase text-primary" href="../<?php echo $listchild['Module_link']; ?>"><?php echo $listchild['childModule_name']; ?></a>
          <?php } ?>
          
        </div> 
      </li>
              <?php }?>
<?php
  }

  else {?>
  <li class="nav-item">           
          <a class="nav-link text-uppercase text-white"  href="../<?php echo $_SESSION['role']; ?>/">Home</a>     
         </li>
         <?php                            
          $querynav = "SELECT * FROM parentmodules WHERE isActive= 1 and roleid =0";
          $resultnav = mysqli_query($conn,$querynav);        
          ?>
           <?php 
            while($lists = mysqli_fetch_array($resultnav))
              {
          ?>        
         <li class="nav-item dropdown">      
         <a class="nav-link dropdown-toggle text-uppercase text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $lists['ParentModule_name']; ?>
        </a>
        <?php 
        $querychild = "SELECT * FROM childmodules WHERE parentModule_id = '".$lists['ParentModule_id']."' and isActive= 1";
        $resultchild = mysqli_query($conn,$querychild);
        ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
            while($listchild = mysqli_fetch_array($resultchild))
              {
                ?>
          <a class="dropdown-item text-uppercase text-primary" href="../<?php echo $listchild['Module_link']; ?>"><?php echo $listchild['childModule_name']; ?></a>
          <?php } ?>
          
        </div> 
      </li>
              <?php }?>
  <?php

  }
  ?>
        
     
  </ul>

  <ul class="navbar-nav ml-auto ">
      <li class=" dropdown justify-content-end">
  <!-- Name -->
        <a class="nav-link dropdown-toggle text-uppercase text-white"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['fullname']; ?>
        </a>
        <div class="  dropdown-menu dropdown-menu-right " data-toggle="dropdown" > 
          <a class="dropdown-item" href="#">Department: <?php echo $_SESSION['Department']; ?>  </a>
          <!-- <a class="dropdown-item" href="#">Supervisor: 213213213 </a> -->
          <a class="dropdown-item" href="#">Role: <?php echo $_SESSION['role']; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" id="logout">Log out</a>
        </div>
      </li>
  </ul>
 
      
</nav>


<script>

$('#logout').click(function(){
  Swal.fire({
        title: 'Are you sure you want to logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1cc88a',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
  if (result.isConfirmed) {

    window.location = '../logout.php';


  }
});
});

$(".navbar .nav-item").on("click", function(){
   $(".navbar").find(".active").removeClass("active");
   $(this).addClass("active");
});
$('body').scrollspy({target: ".navbar"});

$(window).scroll(function() {
  if ($(document).scrollTop() >=1) {
    $('.navbar').addClass('fixed-top');
   
  } else {
    $('.navbar').removeClass('fixed-top');   
  
  }
});
</script>