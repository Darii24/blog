<?php
    require_once('configDB.php');
    require_once('passwordhasher.php');
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $email=$_POST['Email'];
        $password=passwordhasher($_POST['Password']);
        $conn=mysqli_connect(servername, username, password, dbname);
        if(!$conn){
            die('error connecting to DB '.mysqli_connect_error());
        }
        $sql="SELECT*FROM user WHERE Email='".$email."' AND Password='".$password."'";
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['isAut']=true;
            $_SESSION['Login']=$row['Login'];
            $_SESSION['urlAvatar']=$row['urlAvatar'];
            $_SESSION['Role']=$row['Role'];
            echo true;
        } else {
            echo false;
        }
    }