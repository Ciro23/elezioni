<?php

namespace App\Controllers;

class Signup extends BaseController {

    protected array $data = [
        "title" => "Registrazione",
        "regioni" => [],
    ];

    public function index() {
        $regionModel = new \App\Models\Region();
        $this->data['regions'] = $regionModel->getAllRegions();

        echo view("user_auth/Signup", $this->data);
    }

    public function signup() {
        helper("form");

        if ($this->validate("user")) {
            $userModel = new \App\Models\User();
            $userModel->save($this->request->getPost());

            $this->session->set([
                "is_logged_in" => true,
                "uid" => $this->request->getPost("tessera_elettorale"),
            ]);

            return redirect()->route("votazione");
        }

        $regionModel = new \App\Models\Region();
        $this->data['regions'] = $regionModel->getAllRegions();
        $this->data['errors'] = $this->validator->listErrors("custom_errors");

        echo view("user_auth/Signup", $this->data);
    }
}
