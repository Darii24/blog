<?php
    require_once('header.php');
    require_once('configDB.php');
    $conn=mysqli_connect(servername, username, password, dbname);
    if(!$conn){
        die('error connecting to DB '.mysqli_connect_error());
    }
    $sql="SELECT*FROM user WHERE Login='".$_SESSION['Login']."'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $IdAutor=$row['Id'];
    $sql="SELECT*FROM record WHERE Id_autor='".$IdAutor."'";
    $result=mysqli_query($conn, $sql);
    while($record=mysqli_fetch_assoc($result)){
        switch ($record['Status']){
            case 'approved':
                    $status='confirmed by the administrator';
            break;
            case 'not approved':
                    $status='not confirmed by the administrator';
            break;
            case 'delete':
                    $status='delete by the administrator';
            break;
        }
?>

    <div class="m-5 p-2" style="border: solid black 2px">
        <span>Date:</span> <?=$record['Date']?>
        <br>
        <span>Status:</span> <?=$status?>
        <br>
        <hr>
        <p align=justify><?=$record['Text']?></p>
        <div> 
            <!-- <p style="display: inline">
                <img src="image/like.png" alt="" style="width: 10px; height:auto">
                <?=$record['Like']?>
            </p>
            <p style="display: inline">
                <img src="image/dislike.png" alt="" style="width: 10px; height:auto">
                <?=$record['DisLike']?>
            </p> -->
            <button style="display: inline" type="button" class="btn btn-light m-2"><i class="far fa-thumbs-up pl-2 pr-3"></i><?=$record['Like']?></button>
            <button style="display: inline" type="button" class="btn btn-light m-2"><i class="far fa-thumbs-down pl-2 pr-3"></i><?=$record['DisLike']?></button>
        </div>
        <a href="updateRecord.php?id_record=<?=$record['Id']?>" type="button" class="btn btn-success m-2"><i class="fas fa-pen"></i></a>
    </div>

<?php
    }
?>



<?php
    require_once('footer.php');