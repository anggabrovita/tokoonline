<?php

function dump ($var, $die=false){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if ($die) die;
}