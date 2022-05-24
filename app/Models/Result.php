<?php

namespace App\Models;

use CodeIgniter\Model;

class Result extends Model {
    
    public function getAllResults() {

    }

    public function getVotesForParty() {
        $builder = $this->select();
    }
}