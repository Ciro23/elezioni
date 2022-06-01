<?php

namespace App\Controllers;

class Result extends BaseController {

    protected array $data = [
        "title" => "Risultati",
        "votes" => [],
        "votes_for_parties" => [],
        "votes_for_candidates" => [],
        "votes_for_gender" => [],
        "voting_ages" => [],
        "voting_regioni" => []
    ];

    public function index() {
        $model = new \App\Models\Vote();

        $this->data['votes'] = $model->getVotes();
        $this->data['votes_for_parties'] = $model->getVotesForParties();
        $this->data['votes_for_candidates'] = $model->getVotesForCandidates();
        $this->data['votes_for_gender'] = $model->getVotesForGender();
        $this->data['voting_ages'] = $model->getAge();
        $this->data['voting_regioni'] = $model->getRegioni();

        echo view("results/Results", $this->data);
    }
}