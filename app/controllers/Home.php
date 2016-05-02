<?php

 require_once 'Facts.php';

class Home extends Controller {
    public function index() {
        $controller = new Facts();
        $this->twig('index', ['facts' => json_decode($controller->getFacts())]);
    }
}