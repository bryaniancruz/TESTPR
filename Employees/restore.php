
<?php 
include('../scripts.php');
include("../navbar.php");
include("../db.php");

?>
<title> Employees </title>
<div class="container-fluid mt-3">


<!-- Table Example -->
<div class="card border-top-success">
    <div class="card-header font-weight-bold text-success text-uppercase mb-1" > <h4> Employee - Trash Bin </h4>
    <div class="row mt-3">
            <!-- <button class="btn btn-primary btn-sm ml-2" id="createBtn" > <i class="fa fa-plus-square"></i> Create </button> -->
            <button class="btn btn-warning btn-sm ml-2 text-white restoreAll" id="restoreAll" > <i class="fa fa-recycle"></i> Restore All </button>
       
        </div>
    
    </div>
    <div class="card-body">        
        <table id="restoreTBL" class=" table-bordered table-striped border-top-success">        
        <thead>
            <tr>
            <th class="text-center"> Action </th>
                <th>Name</th>
                <th>Position</th>
                <th>Contact</th>     
                <th>Username</th>
                <th>Email</th>           
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
    var restore="restore";
    $('#restoreTBL').DataTable({
        // "scrollX": true,
        "processing":true,
        "serverSide": true,
        "order":[],
        "ajax":{
            url:"fetch.php",
            method:"POST",
            data: {restore: restore}
            
        },
        "columnDefs":[
        {
            "target":[0,3,4],
            "orderable":false,
            // "scrollX": true
        }]
    });
    // $('#restoreTBL').DataTable({
    //     // "scrollX": true,
    //     "processing":true,
    //     "serverSide": true,
    //     "order":[],
    //     "ajax":{
    //         url:"fetchRestore.php",
    //         method:"POST",
            
    //     },
    //     "columnDefs":[
    //     {
    //         "target":[0,3,4],
    //         "orderable":false,
    //         // "scrollX": true
    //     }]
    // });

   } 
    
    // $('#createBtn').click(function(){
    //     window.location.href = "../Employees/create.php";
    // });
    // $('#restoreBtn').click(function(){
    //     window.location.href = "../Employees/restore.php";
    // });


  
   
} );

$(document).on('click', '.restoreAll', function(){
    var restoreAll ="restoreAll";
    Swal.fire({
        title: 'Are you sure you want to restore all users?',
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
            data :{ restoreAll: restoreAll},
            dataType: 'json',
            success : function(data){
                swal.fire(data);                    
                    window.location.reload();
                    load();
            } });
    }
    
});
   });
  
  
   $(document).on('click', '.restore ', function(){
   var id = $(this).attr("id");
   var restore= 'restore';
   Swal.fire({
        title: 'Are you sure you want to restore this user?',
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
            data :{ restore: restore,
                    id:id },
            dataType: 'json',
            success : function(data){
                swal.fire(data);                    
                    window.location.reload();
                    
            } });
    }
    
});
   });

   $(document).on('click', '.lock ', function(){
   var id = $(this).attr("id");
   var unlock= 'unlock';
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