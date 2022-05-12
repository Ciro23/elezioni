<?php

namespace App\Controllers;

class Signup extends BaseController {

    private array $data = [
        "title" => "Registrazione",
    ];

    public function index() {
        echo view("Signup", $this->data);
    }
}
