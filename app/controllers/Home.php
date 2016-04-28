<?php

class Home extends Controller {
    public function index() {
        $this->twig('index', ['test' => 'hallo']);
    }
}