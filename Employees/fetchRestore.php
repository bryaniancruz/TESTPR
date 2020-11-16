
    <?php
    include("../db.php");
    $query = "SELECT * FROM userlists where isActive = 0" ;
    if(isset($_POST["search"]["value"]))
    {
          $query .= '
          and FullName LIKE "%'.$_POST["search"]["value"].'%" ';
       
    }
    if(isset($_POST['order']))
    {
        $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['column'].'';
    
    }
    else {
        $query .= 'ORDER BY ID ';
    
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
        if($row['isLocked'] == 0)
        {
            $sub_array[] = '<td><center>
            <button type="button" name="delete" class="btn btn-warning btn-xs lock" id="'.$row["ID"].'">  <i class="fa fa-recycle"></i> </button>
       
            </center></td>';
        }
        else{
            $sub_array[] = '<td><center><button type="button" name="view" class="btn btn-info btn-xs view" id="'.$row["ID"].'"><i class="fa fa-eye"></i> </button>
            <button type="button" name="edit" class="btn btn-success btn-xs edit" id="'.$row["ID"].'"><i class="fa fa-edit"></i> </button>
            <button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["ID"].'">  <i class="fa fa-trash"></i> </button>
            <button type="button" name="delete" class="btn btn-warning btn-xs unlock" id="'.$row["ID"].'">  <i class="fa fa-lock"></i> </button></center></td>';
        }
       
        // $sub_array[] = '<button type="button" name="edit" class="btn btn-success btn-xs edit" id="'.$row["ID"].'"><i class="fa fa-edit"></i> Edit</button>';
        // $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["ID"].'">  <i class="fa fa-trash"></i> Delete</button></td>';
        $sub_array[] ='<td>'. $row['FullName'].'</td>';
        $sub_array[] ='<td>'. $row['role'] .'</td>';
        $sub_array[] ='<td>'. $row['contactnumber'] .'</td>';
        $sub_array[] ='<td>'. $row['CreatedDate'] .'</td>';
        $data[] = $sub_array;
    }
    
    function get_all_data_to_restore($conn)
    {
     $query = "SELECT * FROM userlists";
     $result = mysqli_query($conn, $query);
     return mysqli_num_rows($result);
    }
    
    $output = array(
     "draw"    => intval($_POST["draw"]),
     "recordsTotal"  =>  get_all_data_to_restore($conn),
     "recordsFiltered" => $number_filter_row,
     "data"    => $data
    );

    echo json_encode($output);
    ?>