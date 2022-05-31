<?php

namespace App\Models;

use CodeIgniter\Model;

class Party extends Model {

    protected $table = "partiti";

    protected $allowedFields = ["nome_partito"];

    /**
     * returns all the parties in the database
     * 
     * @return array
     */
    public function getAllParties(): array {
        $builder = $this->select();

        return $builder->get()->getResult();
    }

    /**
     * returns all the candidates in the database
     * 
     * @return array
     */
    public function getAllCandidates(): array {
        $builder = $this->select();
        $builder->join("candidati", "partiti.id = candidati.partito");

        return $builder->get()->getResult();
    }
}