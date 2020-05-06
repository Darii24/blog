<?php
    const salt='hello world';
    function passwordhasher($password){
        return sha1(salt.$password.salt);
    }