<?php
spl_autoload_register(function($classname){
    $array_path = ['model/','model/pizza/'];
    foreach ($array_path as $value) {
        $path = $value.$classname.'.php';
        if(is_file($path)){
            include_once($path);
        }
    }
});


$uri = strtolower(trim($_SERVER['REQUEST_URI'],'/'));
$path = ['order'];


foreach($path as $action)
    if($uri == $action){
        $action = 'action'.$action;
        Main::$action();
        exit;
    }

    
Main::actionmain();