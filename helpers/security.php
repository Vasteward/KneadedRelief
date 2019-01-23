<?php 

function e($string){
    // ie <script>, the carrot
    return htmlentities($string, ENT_QUOTES, 'UTF-8', false);

}

?>