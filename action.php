<?php 
include("db.php");
if(isset($_POST['action']) == 'login')
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $query ="SELECT u.useraccount_id as ID, concat(p.person_firstname,' ',left(p.person_middlename,1),'.',' ' ,p.person_lastname) as FullName, 
    p.person_email as email ,
    p.person_address as address ,u.username as username ,
     p.person_contact as contactnumber ,r.RoleName as role,
     d.department_name as department,
     u.password as password, u.isLocked as isLocked, u.isActive as isActive
    FROM useraccounts u inner join people p on u.person_id= p.person_id left join departments d on d.department_id = u.DepartmentId  inner join roles r on r.roleid = u.RoleId
    where u.username = '".$username."' OR p.person_email= '".$username."'  " ;
    $rs = mysqli_query($conn,$query);
    $numRows = mysqli_num_rows($rs);
    if($numRows  == 1)
    {
        $row = mysqli_fetch_assoc($rs);
        if(password_verify($password,$row['password'])){
            
            if($row['isLocked'] == 1)
            {
                $msg=array('message'=> '1','text' => 'This user is locked request to your administrator for activation of this account');
            }
            else if($row['isActive']==0)
            {
                $msg=array('message'=> '1','text' => 'This user is currently not active request to your administrator for activation of this account');
           
            }
            else{
            $msg=array('fullname'=>$row['FullName'],
            'role'=>$row['role'],
            'message'=> 'Sucessfuly Logged In');
            session_start();
            $_SESSION['fullname'] = $row['FullName'];
            $_SESSION['Department'] = $row['department'];
            $_SESSION['role'] = $row['role'];
            }
         
        }
        else{
            $id = $row['ID'];
            $isFailed = "UPDATE useraccounts set Fail_Attempt = Fail_Attempt + 1 where useraccount_id = $id";
            mysqli_query($conn,$isFailed);
            $msg=array('message'=> '2',
            'text'=> 'Credentials are incorrect',
            'error' => mysqli_error($conn));

        }
    }
    else{

        $msg=array('message'=> '3','text'=> 'User not exists');

    }

    
}
echo json_encode($msg,JSON_FORCE_OBJECT);
?>