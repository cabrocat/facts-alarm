<?php

class PendingFacts extends Controller {
    public function index() {
        print '<pre>' . json_encode(['error' => 'Invalid Request']) . '</pre>';
    }

    public function add($id = 0) {
        if($id) {
            print '<pre>' . json_encode(['success' => 'Added successfully']) . '</pre>';
        } else {
            print '<pre>' . json_encode(['error' => 'Missing ID']) . '</pre>';
        }
    }
}