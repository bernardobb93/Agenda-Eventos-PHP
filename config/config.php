<?php
$autoload=function($class){
    include ('./class/'.$class.'.php');
};
spl_autoload_register($autoload);
define('INCLUDE_PATH','http://localhost/agenda/pages/');
define('INCLUDE_PATHIN','http://localhost/agenda/');
?>