<?php
    session_start();
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">
        <a class="navbar-brand" href="index.php">BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">POST<span class="sr-only">(current)</span></a>
                </li>
<?php
    if (isset($_SESSION['Role'])&&$_SESSION['Role']=='autor'){
?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My POST
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="viewAutorAllRecord.php">My post</a>
                        <a class="dropdown-item" href="addRecord.php">Add post</a>
                    </div>
                </li>
<?php
    }
?>

<?php
    if (isset($_SESSION['Role'])&&$_SESSION['Role']=='administrator'){
?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Control panel
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Post</a>
                        <a class="dropdown-item" href="#">Comments</a>
                            <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="adminUser.php">User</a>
                    </div>
                </li>
<?php
    }
?>
            </ul>
<?php
    if (isset($_SESSION['isAut'])){
?>
    <img src="avatar/<?$_SESSION['urlAvatar']?>" alt="" style="height:40px; widht:auto; border-radius:50%;">
    <a href="#"><?=$_SESSION['Login']?></a>/
    <a href="logOut.php">log out</a>
<?php
    } else {
?>
    <a href="userInsert.php">reg</a>/
    <a href="#" data-toggle="modal" data-target="#LoginModal">log in</a>
<?php
    }
?>
        </div>
    </nav>