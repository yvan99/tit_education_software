<?php

function getPagename()
{
    # GDISPLAY PAGE NAME WITHOUT .PHP EXTENSION
    $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    $removephp   = substr($curPageName, 0, -4);
    return $removephp;
}
