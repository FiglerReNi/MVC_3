<?php

namespace controller;

use core\twig\TwigConfigure;

class IndexController
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        echo TwigConfigure::getTwigEnvironment()->render('index.twig');
    }

    public function teszt(){
        echo "teszt";
    }
    

}