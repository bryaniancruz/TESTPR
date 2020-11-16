<?php 
include('../scripts.php');
include("../navbar.php");
include("../db.php");
?>
<!-- <select class="form-control" id="icons">
<option value="" > SELECT ICON </option>
<option value="2" > SELECT ICON </option>
</select> -->
<div class="container-fluid">
<div class="row">
<div class="col-xl-3 col-md-6 mb-4 mt-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>

<script>
 $("#icons").change(function(){
        
 $.ajax({
            url: 'fetchIcons.php',
            type: 'POST',
            // data : {deptart: deptid},
            dataType: 'json',
            success : function(data){
                var len = data.length;
                $("#icons").empty();                
                for( var i = 0; i<len; i++){
                    var id = data[i][0][1];
                    var name = data[i][0];                    
                    $("#icons").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
});
</script>