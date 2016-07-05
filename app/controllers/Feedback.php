<?php

class Feedback extends Controller
{

    public function index()
    {
        $controller = new Feedback();
        $this->twig('feedback', ['feedback' => json_decode($controller->getFeedback())]);
    }

    public function getFeedback()
    {
        return FeedbackItem::all();
    }

    public function create()
    {
        $json = json_decode(file_get_contents('php://input'));
        if (isset($json)) {
            foreach ($json as $item) {
                FeedbackItem::create([
                    'FeedbackText' => $item->FeedbackText ? $item->FeedbackText : '',
                    'Category' => $item->Category ? $item->Category : '',
                    'DeviceFamily' => $item->DeviceFamily ? $item->DeviceFamily : '',
                    'OsVersion' => $item->OsVersion ? $item->OsVersion : '',
                    'SystemSku' => $item->SystemSku ? $item->SystemSku : '',
                    'SystemArchitecture' => $item->SystemArchitecture ? $item->SystemArchitecture : '',
                    'AppVersion' => $item->AppVersion ? $item->AppVersion : '',
                ]);
            }

            print '<pre>' . json_encode(['success' => 'Successfully added feedback']) . '</pre>';
        } else {
            print '<pre>' . json_encode(['error' => 'Missing JSON data']) . '</pre>';
        }
    }

}