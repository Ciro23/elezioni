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
        $emailModel->sendEmail($user);

        echo view("email_verification/Sending", $this->data);
    }

    public function verificate(string $hash): RedirectResponse {
        $emailModel = new \App\Models\Email();
        if (!$emailModel->verificate($hash)) {
            throw new PageNotFoundException();
        }

        $emailModel->delete($hash);

        $this->session->set([
            "is_logged_in" => true,
            "uid" => $this->request->getPost("tessera_elettorale"),
        ]);

        return redirect()->to(base_url() . "/votazione/?welcome_popup=true");
    }
}