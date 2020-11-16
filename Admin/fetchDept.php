<?php
 include('../db.php');

if(isset($_POST['deptart']))
{
 $departid = mysqli_real_escape_string($conn,$_POST['deptart']); // department id
}
$dept_arr = array();

$role = "SELECT * FROM `roles` WHERE roleId = $departid";
$role_result = mysqli_query($conn,$role);

while($roleList = mysqli_fetch_array($role_result))
{
    if($roleList['isDepthead'] ==1 ) //filters if department head
    {
        $sql = "SELECT * FROM deparments WHERE isActive= 1";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result))
        {
            $userid = $row['department_id'];
            $name = $row['department_name'];
            $dept_arr[] = array("department_id" => $userid, "department_name" => $name);
        }

        echo json_encode($dept_arr);
    }
    else {
        $sql = "SELECT * FROM deparments WHERE isActive= 1";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result))
        {
            $userid = $row['department_id'];
            $name = $row['department_name'];
            $dept_arr[] = array("department_id" => $userid, "department_name" => $name);
        }

        echo json_encode($dept_arr);
    }

}



?>
