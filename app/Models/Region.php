<?php

namespace App\Models;

use CodeIgniter\Model;

class Region extends Model {

    protected $table = "regioni";

    protected $allowedFields = ["nome"];

    /**
     * returns all the regions in the database
     * 
     * @return array
     */
    public function getAllRegions(): array {
        $builder = $this->select("*");

        if ($builder->countAllResults(false) > 0) {
            return $builder->get()->getResult();
        }

        return [];
    }
}