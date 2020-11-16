<?php
 if(isset($_POST['post']) == "view"){
    $name = $_POST['action'];

    $output = array(        
        "data"    => $data,
        "name" =>$name
       );
}
echo json_encode($output);
?>