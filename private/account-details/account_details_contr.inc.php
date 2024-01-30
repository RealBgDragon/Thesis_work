<?php

function displayUser($pdo, $userId)
{
    $userData = getUser($pdo, $userId);
    outputUserInfo($userData);
}

function handleErrors($errors)
{
    outputUserInfo($errors);
}