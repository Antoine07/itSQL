<?php

namespace App\Controller\Factory;

// alias
// use Services\Mail as Mail;
use App\Services\Mail ;


class HomeController {

    public function __construct()
    {
        $service = new Mail ;
    }
}