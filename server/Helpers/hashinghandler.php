<?php
function create_hash($password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

function verify_password($password, $hashed)
{
    //this will verify if hashed password are same as inputed
    if (password_verify($password, $hashed)) {
        return true;
    }
    return false;
}
