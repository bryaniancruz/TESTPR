
<?php 
include('../scripts.php');
include("../navbar.php");
include("../db.php");
?>
<title> Workflow </title>
<div class="container-fluid mt-3">
    <div class="card border-top-primary">
        <div class="card-header font-weight-bold text-dark text-uppercase " ><h4>Workflow</h4></div>
        
        <div class="card-body">
            <table id="workflowTable" class=" table-bordered table-striped ">        
                <thead>
                    <tr>
                        <th class="text-center"> Action </th>
                        <th>Workflow Name</th>
                        <!-- <th>Code</th>                                                   -->
                    </tr>
                </thead>        
            </table>
        </div>

    </div>
</div>


<div class="modal fade" id="workflowModal">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Workflow</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
            </div>
        </div>
    </div>
</div>

<script>


load();
   function load(){
       var load ="load";
    $('#workflowTable').DataTable({
        // "scrollX": true,
        "scrollY": "250px",
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

$(document).on('click','.view',function(){
    var id = $(this).attr('id');
    var post= "view";
    var action= id;
    $.ajax({
        url: "fetch.php",
        type: "POST",
        data: { post: post ,
                action : action},
        dataType: "json",
        success : function(data){
            $("#workflowModal").modal("show");
            console.log(data.name);
        }
    });
   
    
});
</script>