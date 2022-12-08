<?php 

function setSelectTabforHTML($tabIndex, $current_tab) {

    if ($current_tab == $tabIndex) {
        return 'true';
    }
    return 'false';

}