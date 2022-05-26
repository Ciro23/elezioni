<?php

namespace App\Models;

use CodeIgniter\Model;

class Region extends Model {

    protected $table = "regioni";

    protected $allowedFields = ["nome"];

    public function getAllRegions() {
        $builder = $this->select("*");

        if ($builder->countAllResults(false) > 0) {
            return $builder->get()->getResult();
        }

        return [];
    }
}