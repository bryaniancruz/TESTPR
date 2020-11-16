<?php
include("../db.php");
$output = array();

if(isset($_POST['load']) == "load"){

    $query = "SELECT * FROM Workflows WHERE isActive = 1 " ;
    if(isset($_POST["search"]["value"]))
    {
          $query .= 'and WorkflowName LIKE "%'.$_POST["search"]["value"].'%" ';
       
    }
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['column'].'';
    
    }
    else {
        $query .= 'ORDER BY WorkflowID ';
    
    }
    $query1 ='';
    if($_POST["length"] != -1)
    {
        $query .= ' LIMIT ' .$_POST['start'].', '.$_POST['length'];
    }
    $result = mysqli_query($conn,$query) or die (mysqli_error($conn));
    $number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));
    // $result = mysqli_query($conn,$query);
    
    $data = array();
    
    while($row = mysqli_fetch_array($result))
    {
        $sub_array = array();
        $sub_array[] = '<td><center><button type="button" name="view" class="btn btn-success btn-xs view" id="'.$row["childModule_id"].'"><i class="fa fa-edit"></i> </button></center></td>';
        $sub_array[] ='<td>'. $row['WorkflowName'].'</td>';
       
        $data[] = $sub_array;
    }
    
    function get_all_data($conn)
    {
     $query = "SELECT * FROM workflows";
     $result = mysqli_query($conn, $query);
     return mysqli_num_rows($result);
    }
    
    $output = array(
     "draw"    => intval($_POST["draw"]),
     "recordsTotal"  =>  get_all_data($conn),
     "recordsFiltered" => $number_filter_row,
     "data"    => $data
    );
}


echo json_encode($output);

?>