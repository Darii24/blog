<?php
    require_once('configDB.php');
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $conn=mysqli_connect(servername, username, password, dbname);
        if(!$conn){
            die('error connecting to DB '.mysqli_connect_error());
        }
        $sql="UPDATE record SET `Like`=`Like`+1 WHERE Id='".$_POST['Id']."'";
        if (mysqli_query($conn, $sql)){
            $sql="SELECT*FROM record WHERE Id='".$_POST['Id']."'";
            $result=mysqli_query($conn, $sql);
            $record=mysqli_fetch_assoc($result);
            mysqli_close($conn);
            echo json_encode($record);
        } else {
            echo false;
        }
    }