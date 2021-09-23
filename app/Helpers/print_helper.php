<?php

function ddd($data = '', $stop = 0)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    if($stop != 0)
        die();
}

?>