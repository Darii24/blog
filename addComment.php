<?php
     require_once('configDB.php');
     if ($_SERVER['REQUEST_METHOD']=="POST"){
         $conn=mysqli_connect(servername, username, password, dbname);
         if(!$conn){
             die('error connecting to DB '.mysqli_connect_error());
         }