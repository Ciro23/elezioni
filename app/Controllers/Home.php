<?php

namespace App\Controllers;

class Home extends BaseController {

    protected array $data = [
        "title" => "Homepage",
    ];

    public function index() {
        echo view("Home", $this->data);
    }
}