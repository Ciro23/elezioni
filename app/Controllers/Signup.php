<?php

namespace App\Controllers;

class Signup extends BaseController {

    protected array $data = [
        "title" => "Registrazione",
        "regioni" => [],
    ];

    public function index(): void {
        $regionModel = new \App\Models\Region();
        $this->data['regions'] = $regionModel->getAllRegions();

        echo view("user_auth/Signup", $this->data);
    }

    public function signup(): mixed {
        helper("form");

        if ($this->validate("user")) {
            $formData = $this->request->getPost();
            $tessera_elettorale = $formData['tessera_elettorale'];

            $userModel = new \App\Models\User();
            $userModel->save($formData);

            $emailModel = new \App\Models\Email();
            $emailModel->save(['utente' => $tessera_elettorale]);

            $redirectUrl = base_url() . "/signup/send-email/" . $tessera_elettorale;
            return redirect()->to($redirectUrl);
        }

        $regionModel = new \App\Models\Region();
        $this->data['regions'] = $regionModel->getAllRegions();
        $this->data['errors'] = $this->validator->listErrors("custom_errors");

        echo view("user_auth/Signup", $this->data);
    }
}
