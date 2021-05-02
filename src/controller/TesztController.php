<?php


namespace controller;


class TesztController
{

    /**
     * TesztController constructor.
     */
    public function __construct()
    {
        echo 'tesztünk';
    }

    public function valami($params){
        foreach ($params as $param){
            echo $param;
        }
    }
}