<?php

namespace App\Controllers;

class login extends BaseController {

    protected array $data = [
        "title" => "Login",
        "regioni" => [],
    ];

    public function index(): void {
        echo view("user_auth/Login", $this->data);
    }

    public function login() {
        helper("form");

        if ($this->validate("login")) {
            $formData = $this->request->getPost();

            $this->session->set([
                "is_logged_in" => true,
                "pin" => $formData['pin'],
            ]);

            $redirectUrl = base_url() . "/vote";
            return redirect()->to($redirectUrl);
        }

        $this->data['errors'] = $this->validator->listErrors("custom_errors");

        echo view("user_auth/Login", $this->data);
    }

    public function logout() {
        $this->session->destroy();
        return redirect("home");
    }
}
