<?php

function display($users)
{
    echo "<div class='dropdown'>";
    echo "<label for='productSelect'>Select Air Conditioner:</label>";
    echo "<select id='productSelect' name='productSelect'>";
    foreach ($users as $user) {
        echo "<option value='{$user['user_id']}'>{$user['name']}</option>";
    }
    echo "</select>";
    echo "</div>";
}