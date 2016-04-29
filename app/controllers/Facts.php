<?php

class Facts extends Controller {

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

    public function create() {
        $json = json_decode(file_get_contents('php://input'));
        if(isset($json)) {
            foreach ($json as $item) {
                if(isset($item->Title) && isset($item->Text) 
                && isset($item->Author) && isset($item->Image)) {
                    Fact::create([
                        'title' => $item->Title,
                        'text' => $item->Text,
                        'author' => $item->Author,
                        'image' => $item->Image,
                    ]);

                    print '<pre>' . json_encode(['success' => 'Successfully submitted fact']) . '</pre>';
                } else {
                    print '<pre>' . json_encode(['error' => 'Missing JSON properties']) . '</pre>';
                }
            }
        } else {
            print '<pre>' . json_encode(['error' => 'Missing JSON data']) . '</pre>';
        }
    }
}