<?php

class Facts extends Controller
{

    public function index($id = 0)
    {
        if ($id) {
            // Get fact with ID
            print '<pre>' . json_encode($this->getFact($id)) . '</pre>';
        } else {
            // Get all facts
            print '<pre>' . json_encode($this->getFacts()) . '</pre>';
        }
    }

    public function getFact($id)
    {
        return Fact::find($id);
    }

    public function getFacts()
    {
        return Fact::all();
    }

    public function random($exclude = 0)
    {
        $facts = json_decode(json_encode($this->getFacts()));
        $exclude_facts = $exclude ? explode(',', $exclude) : [];
        $available_facts = [];

        foreach ($facts as $fact) {
            if(!in_array($fact->ID, $exclude_facts)) {
                $available_facts[] = $fact;
            }
        }

        $rand = array_rand($available_facts);

        print '<pre>' . json_encode($available_facts[$rand]) . '</pre>';
    }

    public function create()
    {
        $json = json_decode(file_get_contents('php://input'));
        if (isset($json)) {
            foreach ($json as $item) {
                if (isset($item->Title) && isset($item->Text)
                    && isset($item->Author) && isset($item->Image) && isset($item->Language)
                ) {
                    Fact::create([
                        'Title' => $item->Title,
                        'Text' => $item->Text,
                        'Author' => $item->Author,
                        'Image' => $item->Image,
                        'Language' => $item->Language,
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

    public function update($id = 0)
    {
        if ($id) {
            $success = FALSE;

            if (isset($_POST) && !is_null($_POST) && !empty($_POST)) {
                $p = $_POST;

                if (isset($p['title']) && isset($p['text'])
                    && isset($p['author']) && isset($p['image']) && isset($p['language'])
                ) {
                    $fact = $this->getFact($id);

                    $fact->title = $p['title'];
                    $fact->text = $p['text'];
                    $fact->author = $p['author'];
                    $fact->image = $p['image'];
                    $fact->language = $p['language'];

                    $success = $fact->save();
                }
            }

            $this->twig('update', [
                'fact' => json_decode($this->getFact($id)),
                'success' => $success
            ]);
        } else {
            header("Location: ../../index");
            die();
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

    public function generate($amount)
    {
        for ($i = 0; $i < $amount; $i++) {
            Fact::create([
                'Title' => 'Feitje_' . $i,
                'Text' => 'Text_' . $i,
                'Author' => 'Author_' . $i,
                'Image' => 'Image' . $i . '.jpg',
                'Language' => 'NL',
            ]);
        }
    }
}