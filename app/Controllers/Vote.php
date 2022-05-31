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
            
            if ($formData['candidato_1'] === "") {
                $formData['candidato_1'] = null;
            }

            if ($formData['candidato_2'] === "") {
                $formData['candidato_2'] = null;
            }

            $voteModel->save($formData);
            $userModel = new \App\Models\User();

            $electoralCardNumber = $userModel->getUserElectoralCardByPin($this->session->pin);
            $userModel->update($electoralCardNumber, ['ha_votato' => 1]);

            $this->session->destroy();

            return redirect("results");
        }

        $this->data['errors'] = $this->validator->listErrors("custom_errors");
        echo view("voting/Vote", $this->data);
    }
}