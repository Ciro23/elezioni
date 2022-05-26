<?php

namespace App\Controllers;

class PinRetriver extends BaseController {

    protected array $data = [
        "title" => "Recupera il pin unico",
    ];

    public function index(): void {
        $error = $this->request->getGet("email-not-found") ?? false;

        $error_message = "";
        if (boolval($error)) {
            $error_message = "Non esiste un account associato a quest'email";
        }

        echo view("user_auth/RetrievePin", array_merge(
            $this->data,
            ["errors" => $error_message],
        ));
    }

    public function sendEmail() {
        $emailModel = new \App\Models\Email();
        $userModel = new \App\Models\User();

        $email = $this->request->getPost("email");

        $pin = $userModel->getUserPinByEmail($email);

        if ($pin === null) {
            return redirect()->to(base_url() . "/retrieve-pin/?email-not-found=true");
        }

        $subject = "Recupera Pin unico per votare - Votazioni Parlamentari";
        $message = "Pin: " . $pin;
        $emailModel->sendEmail($email, $subject, $message);

        return redirect("login");
    }
}