<?php

namespace App\Models;

use CodeIgniter\Model;

class Vote extends Model {
 
    protected $table = "voti";

    protected $allowedFields = ["partito", "candidato_1", "candidato_2"];

    protected $validationRules = "vote";

}