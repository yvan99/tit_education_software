<?php
function passwordGenerator($type)
{
    $individual = verificationToken();
    $password = $type . $individual . "?";
    return $password;
}
