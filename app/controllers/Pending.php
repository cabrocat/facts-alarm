<?php

class Pending extends Controller
{
    public function index()
    {
        $controller = new Pending();
        $this->twig('pending', ['facts' => json_decode($controller->getFacts())]);
    }

    public function getFacts()
    {
        return PendingFact::all();
    }

    public function add($id = 0)
    {
        if ($id) {
            print '<pre>' . json_encode(['success' => 'Added successfully']) . '</pre>';
        } else {
            print '<pre>' . json_encode(['error' => 'Missing ID']) . '</pre>';
        }
    }

    public function delete($id = 0)
    {
        if ($id) {
            $fact = $this->getFact($id);
            $fact->delete();
        }

        header("Location: ../../index");
        die();
    }

    public function getFact($id)
    {
        return PendingFact::find($id);
    }

    public function approve($id = 0)
    {
        if ($id) {
            $fact = $this->getFact($id);
            $json = json_decode($fact);

            Fact::create([
                'Title' => $json->Title,
                'Text' => $json->Text,
                'Author' => $json->Author,
                'Image' => $json->Image,
            ]);

            $fact->delete();
        }

        header("Location: ../../index");
        die();
    }

    public function generate($amount)
    {
        for ($i = 0; $i < $amount; $i++) {
            PendingFact::create([
                'Title' => 'Feitje_' . $i,
                'Text' => 'Text_' . $i,
                'Author' => 'Author_' . $i,
                'Image' => 'Image' . $i . '.jpg',
            ]);
        }
    }
}