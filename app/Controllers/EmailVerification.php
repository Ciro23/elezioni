<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;

class EmailVerification extends BaseController {

    protected array $data = [
        "title" => "Verifica il tuo indirizzo email",
    ];

    public function sendEmail(string $user): void {
        $emailModel = new \App\Models\Email();
        $userModel = new \App\Models\User();
        $userData = $userModel->getEmailPinHash($user);

        $url = base_url() . "/signup/verificate-email/" . $userData->hash;
        $subject = "Verifica la tua email - Votazioni parlamentari";
        $message = "Clicca <a href='{$url}'>qui</a> per verificare il tuo indirizzo email. Pin unico per votare: {$userData->pin}";

        $emailModel->sendEmail($userData->email, $subject, $message);

        echo view("email_verification/Sending", $this->data);
    }

    public function verificate(string $hash): RedirectResponse {
        $emailModel = new \App\Models\Email();
        if (!$emailModel->verificate($hash)) {
            throw new PageNotFoundException();
        }

        $emailModel->delete($hash);

        return redirect()->to(base_url() . "/login/?welcome_popup=true");
    }
}