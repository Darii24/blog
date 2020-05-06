<?php
    require_once('header.php');
    require_once('configDB.php');
    $conn=mysqli_connect(servername, username, password, dbname);
    if(!$conn){
        die('error connecting to DB '.mysqli_connect_error());
    }
    $sql="SELECT*FROM user";
    $result=mysqli_query($conn, $sql);

?>
    <table border="1" class="m-5">
        <thead>
            <td>Id</td>
            <td>Nick</td>
            <td>Email</td>
            <td>Role</td>
            <td>Change Role</td>
            <td>DELETE USER</td>  
        </thead>
        <tbody>

<?php
    while($record=mysqli_fetch_assoc($result)){
?>

            <tr>
                <td class="Id"><?=$record['Id']?></td>
                <td><?=$record['Login']?></td>
                <td><?=$record['Email']?></td>
                <td class="TextRole"><?=$record['Role']?></td>
                <td>
                    <select name="Role" class="ChangeRole">
                        <option value="follower">Follower</option>
                        <option value="autor">Autor</option>
                        <option value="administrator">Administrator</option>
                    </select>
                </td>
                <td>
                    DELETE
                </td>
            </tr>

<?php
    }
?>

        </tbody>
    </table>

<?php
    require_once('footer.php');
?>

    <script src="JS/userRole.js"></script>