<?php
    
    $conn = new mysqli('localhost','root','root','project_db','8889');
    if($conn->connect_errno){
        echo $conn->connect_errno.": ".$conn->connect_error;
    }

?>