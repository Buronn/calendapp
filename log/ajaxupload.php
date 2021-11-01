<?php
    $user = $_POST['user'];
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        
        if(isset($_FILES['file'])){
            $location = $user.'.png';
            if (move_uploaded_file($_FILES['file']['tmp_name'],  "../uploads/$location")){
                echo "../uploads/$location";
            } else{
                echo "ERROR";
            }
        }
    }

?>