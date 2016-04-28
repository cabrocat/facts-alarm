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
        // Send request to database
        $fact = $this->model('fact');
        $fact->id = $id;
        $fact->title = 'Radijs';
        $fact->text = 'Een heel mooi feitje over een radijsje';
        $fact->author = 'Kevin Brocatus';
        $fact->image = 'http://s3-eu-west-1.amazonaws.com/mijntuin/groennet/uploadedImages/radijs(2).jpg';

        return $fact;
    }

    public function getFacts() {
        $facts = array();
        for ($i=0; $i < 5; $i++) { 
            $fact = $this->model('fact');
            $fact->id = $i;
            $fact->title = 'Radijs';
            $fact->text = 'Een heel mooi feitje over een radijsje';
            $fact->author = 'Kevin Brocatus';
            $fact->image = 'http://s3-eu-west-1.amazonaws.com/mijntuin/groennet/uploadedImages/radijs(2).jpg';

            $facts[] = $fact;
        }

        return $facts;
    }
}