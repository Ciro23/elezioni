<?php

namespace App\Controllers;

class Result extends BaseController {

    protected array $data = [
        "title" => "Risultati",
        "votes_for_parties" => [],
        "votes_for_candidates" => [],
        "votes_for_gender" => [],
    ];

    public function index() {
        $model = new \App\Models\Vote();

        $this->data['votes_for_parties'] = $model->getVotesForParties();
        $this->data['votes_for_candidates'] = $model->getVotesForCandidates();
        $this->data['votes_for_gender'] = $model->getVotesForGender();

        echo view("results/Results", $this->data);
    }
}