<?php

class Facts extends Controller {

    protected $fact;

    public function __construct() {
        $this->fact = $this->model('Fact');
    }

    public function index($id = 0) {
        if($id) {
            // Get fact with ID
            print '<pre>' .  json_encode($this->getFact($id)) . '</pre>';
        } 
        else {
            // Get all facts
            print '<pre>' .  json_encode($this->getFacts()) . '</pre>';
        }
    }

    public function getFact($id) {
        return Fact::find($id);
    }

    public function getFacts() {
        return Fact::all();
    }

    public function create($title, $text) {
        $this->fact->create([
            'title' => $title,
            'text' => $text
        ]);
    }
}