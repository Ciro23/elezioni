<?php

namespace App\Controllers;

class Votazione extends BaseController {

    protected array $data = [
        "title" => "Votazione",
    ];

    public function index() {
        echo view("user_auth/votazione",$this->data);
    }
}