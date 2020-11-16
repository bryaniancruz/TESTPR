
<?php 
include('../scripts.php');
include("../navbar.php");
include("../db.php");

?>
<title> Employees </title>
<div class="container-fluid mt-3">


<!-- Table Example -->
<div class="card border-top-success">
    <div class="card-header font-weight-bold text-success text-uppercase mb-1" > <h4> Employee List </h4>
    <div class="row mt-3">
            <button class="btn btn-primary btn-sm ml-2" id="createBtn" > <i class="fa fa-plus-square"></i> Create </button>
            <button class="btn btn-warning btn-sm ml-2 text-white" id="restoreBtn" > <i class="fa fa-recycle"></i> Restore </button>
       
        </div>
    
    </div>
    <div class="card-body">        
        <table id="myTable" class=" table-bordered table-striped border-top-success">        
        <thead>
            <tr>
            <th class="text-center"> Action </th>
                <th>Name</th>
                <th>Position</th>
                <th>Username</th>
                <th>Email   </th>
                <th>Contact</th>                
                <th>Date Created</th>
                          
            </tr>
        </thead>
        
        </table>
    </div>
</div>


</div>



<script>
$(document).ready( function () {
load();
   function load(){
       var load ="load";
    $('#myTable').DataTable({
        // "scrollX": true,
        "scrollY": "300px",
        "processing":true,
        "serverSide": true,
        "order":[],
        "ajax":{
            url:"fetch.php",
            method:"POST",
            data: {load:load}           
        },
        "columnDefs":[
        {
            "target":[0,3,4],
            "orderable":false,
            // "scrollX": true
        }]
    });
   } 
    
    $('#createBtn').click(function(){
        window.location.href = "../Employees/create.php";
    });
    $('#restoreBtn').click(function(){
        window.location.href = "../Employees/restore.php";
    });


  
   
} );

$(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   var deleteUser= 'deleteUser';
   Swal.fire({
        title: 'Are you sure you want to delete this user?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1cc88a',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data :{ deleteUser: deleteUser,
                    id:id },
            dataType: 'json',
            success : function(data){
                    
                    window.location.reload();
                    
            } });
    }
    
});
   
   });
   $(document).on('click', '.edit', function(){
   var id = $(this).attr("id");
   alert(id);
   });
   $(document).on('click', '.view ', function(){
   var id = $(this).attr("id");
   alert(id);
   });
  
   $(document).on('click', '.unlock ', function(){
   var id = $(this).attr("id");
   var lock= 'unlock';
   Swal.fire({
        title: 'Are you sure you want to unlock this user?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1cc88a',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data :{ lock: lock,
                    id:id },
            dataType: 'json',
            success : function(data){
                    
                    window.location.reload();
                    
            } });
    }    
});
   });
   $(document).on('click', '.lock ', function(){
   var id = $(this).attr("id");
   var unlock= 'unlock';
   Swal.fire({
        title: 'Are you sure you want to lock this user?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1cc88a',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data :{ unlock: unlock,
                    id:id },
            dataType: 'json',
            success : function(data){
                    
                    window.location.reload();
                    
            } });
    }
    
});
   });
</script>