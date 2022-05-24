<?php

namespace App\Controllers;

class Vote extends BaseController {

    protected array $data = [
        "title" => "Votazione",
        "parties" => [],
        "candidates" => [],
    ];

    public function index() {
        $model = new \App\Models\Party();
        $this->data['parties'] = $model->getAllParties();
        $this->data['candidates'] = $model->getAllCandidates();

        echo view("voting/Vote", $this->data);
    }

    public function vote() {
        $model = new \App\Models\Party();
        
        if ($this->validate("vote")) {
            
        }
    }
}