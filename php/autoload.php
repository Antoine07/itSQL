<?php
spl_autoload_register(function ($className) {
    
    var_dump($className);

    $fileName = $className . ".php"; // le nom de la classe c'est le nom du fichier

    if(file_exists($fileName)){

        // die($fileName);

        require_once $fileName ;

        return;
    }

    die;
});


$model = new Model() ;
$post = new Post() ;
