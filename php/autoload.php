<?php
spl_autoload_register(function ($className) {
    
    var_dump($className);

    $className = substr(trim( $className, '\\' ),4);

    die($className);

    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className) . ".php"; // le nom de la classe c'est le nom du fichier
    var_dump($fileName);

    if(file_exists($fileName)){

        // die($fileName);

        require_once $fileName ;

        return;
    }

});

// alias

use App\Controller\Factory\HomeController as HomeController;
use App\Services\Mail as Mail ;

use App\Model;
use App\Post;

$model = new Model() ;
$post = new Post() ;

$mail = new Mail();

// $home = new \Controller\Factory\HomeController();

$home = new HomeController();
