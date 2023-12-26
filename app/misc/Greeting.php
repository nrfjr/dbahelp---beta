<?php

function greetings($username)
{

    date_default_timezone_set(TIME_ZONE);

    $date = date('G');

    if ($date > 00 && $date < 12) {
        return 'Good morning, ' . $username . '!';
    } else if ($date >= 12 && $date < 17) {
        return 'Good afternoon, ' . $username . '!';
    } else {
        return 'Good evening, ' . $username . '!';
    }
}


