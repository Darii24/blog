<?php
    require_once('../configDB.php');
    $conn = mysqli_connect(servername, username, password, dbname);
    if(!$conn) {
        die('connecting error'.mysqli_connect_error());
    }
    $email=$_GET['id'];
    $sql="SELECT*FROM user WHERE Email='".$email."'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0) {
        $row=mysqli_fetch_assoc($result);
        if($row['Status']){
?>
    <b>Email has already been verified</b>
<?php
        } else {
            session_start();
            $_SESSION['isAut']=true;
            $_SESSION['Login']=$row['Login'];
            $_SESSION['urlAvatar']=$row['urlAvatar'];
            $_SESSION['Role']='follower';
            $sql="UPDATE user SET Role='follower', Status=true";
            $result=mysqli_query($conn, $sql);
?>
    <b>Email confirmed</b>
<?php
        }
    }
?>
    <a href="http://localhost/Blog/">back to home page</a>