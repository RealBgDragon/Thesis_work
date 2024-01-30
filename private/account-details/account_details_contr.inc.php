<?php

function isUserLoggedIn()
{
    if (isset($_SESSION["userId"])) {
        return true;
    } else {
        return false;
    }
}