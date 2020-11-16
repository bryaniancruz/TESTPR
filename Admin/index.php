<link rel="stylesheet" href="../Styles/bootstrap.min.css">
<link rel="stylesheet" href="../Styles/border.css">
    <script src ="../Scripts/jquery-3.5.1.min.js"></script> 
    <script src ="../Scripts/Chart.min.js"></script>   
    <script src ="../Scripts/popper.min.js"></script>
    <script src ="../Scripts/bootstrap.min.js"></script>
    <script src ="../Scripts/sweetalert.js"></script>
    <script src ="../DataTables/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../DataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Admin - Home</title>
   
<?php 
include("../navbar.php");
?>
<div class="container-fluid mt-3">

<div class="row ">  


        <div class="col-xl-3 col-xl-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="#">Dashboard Widget </a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

</div>

<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>