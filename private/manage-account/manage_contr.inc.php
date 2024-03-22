<?php
function isUserAdmin($admin)
{
    if (isset ($admin) && $admin == "admin") {
        return true;
    } else {
        return false;
    }
}