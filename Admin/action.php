<?php 
 include('../db.php');
 $msg ='';
 if(isset($_POST['action']) == 'addUser')
 {
    $user_arr = array();
    $firstname = $_POST['firstname'];
    $middlename= $_POST['middlename'];
    $lastname =  $_POST['lastname'];
    $address = $_POST['address'];
    $email =$_POST['email'];
    $username=$_POST['username'];
    $contact=$_POST['contact'];
    $password=$_POST['password'];
    $options = array("cost"=>4);
    $password = password_hash($password,PASSWORD_BCRYPT,$options);    

    $dept=$_POST['dept'];
    $role=$_POST['role'];

    $query = "INSERT into people(person_firstname,person_middlename,person_lastname,person_email,person_contact,person_address,isActive,CreatedByUserId,CreatedDate) 
    VALUES ('".$firstname."','".$middlename."','".$lastname."','".$email."','".$contact."','".$address."',1,1,now())";
    if(mysqli_query($conn,$query))
    {
        $personId = mysqli_insert_id($conn); // New record
        $insertdata ="INSERT into useraccounts(person_id,DepartmentId,Roleid,username,password,isActive,isLocked,CreatedByUserId,CreatedDate)VALUES ('".$personId."','".$dept."','".$role."','".$username."','".$password."',1,0,1,now())";
        if(mysqli_query($conn,$insertdata))
        {
        $msg="Data Successfully Added";
          mysqli_error($conn);
        }
    }
    else 
    {
        $msg= mysqli_error($conn);
    }
    mysqli_close($conn);
  
 }
 echo json_encode($msg);
?>