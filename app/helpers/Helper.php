<?php
try {
    session_start();
} catch (\Exception | \Error | \Throwable | \TypeError $e) {
}

function setSelectTabforHTML($tabIndex, $current_tab) {

    if ($current_tab == $tabIndex) {
        return 'true';
    }
    return 'false';

}

    // Page redirect
    function redirect($page){
        header('Location: '.URLROOT. '/' . $page);
    }