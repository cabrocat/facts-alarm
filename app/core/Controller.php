<?php

class Controller
{
    private $views = 'views';

    public function twig($view, $data)
    {
        $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . "/" . $this->views);
        $twig = new Twig_Environment($loader, [
            'debug' => true
        ]);
        $twig->addExtension(new Twig_Extension_Debug());

        echo $twig->render($view . '.html', $data);
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
}