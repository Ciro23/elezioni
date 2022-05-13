<?php

namespace App\Controllers;

class Signup extends BaseController {

    private array $data = [
        "title" => "Registrazione",
    ];

    public function index() {
        echo view("Signup", $this->data);
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

            return redirect("home");
        }

        $this->data['errors'] = $this->validator->listErrors("custom_errors");

        echo view("user_auth/signup", $this->data);
    }
}
