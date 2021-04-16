<?php


namespace core\twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigConfigure
{
    public static function getTwigEnvironmet(): Environment
    {
        $loader = new FilesystemLoader(TWIGPATH);
        $twig = new Environment($loader);
        return $twig;
    }
}