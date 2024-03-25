<?php

function isCommentSet($comment)
{
    if (strlen(trim($comment)) === 0) {
        return false;
    } else {
        return true;
    }
}