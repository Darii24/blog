<?php
    require_once('header.php');
    require_once('configDB.php');
    // session_start();
?>
<h1 class="m-5">ADD POST</h1>
<form action="" method="POST" class="m-5">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="Text"></textarea>
    </div>
    <button type="submit">SAVE</button>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $conn=mysqli_connect(servername, username, password, dbname);
        if(!$conn){
            die('error connecting to DB '.mysqli_connect_error());
        }
        $sql="SELECT*FROM user WHERE Login='".$_SESSION['Login']."'";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        $IdAutor=$row['Id'];
        $Text=$_POST['Text'];
        $Date=date('yy-m-d');
        $sql = "INSERT INTO record (Id_autor, Text, Date) VALUES ('".$IdAutor."','".$Text."','".$Date."')";
        if (mysqli_query($conn, $sql)){
            mysqli_close($conn);
            session_start();
            header('Location: index.php');
        } else {
            echo 'ERROR: '.$sql.' '.mysqli_error($conn);
        }
    }

    require_once('footer.php');