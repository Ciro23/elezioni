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
        $voteModel = new \App\Models\Vote();
        
        if ($this->validate("vote")) {
            $formData = $this->request->getPost();
            $voteModel->save($formData);

            $this->session->destroy();

            return redirect("risultati");
        }

        $model = new \App\Models\Party();
        $this->data['parties'] = $model->getAllParties();
        $this->data['candidates'] = $model->getAllCandidates();
        $this->data['errors'] = $this->validator->listErrors("custom_errors");

        echo view("voting/Vote", $this->data);
    }
}