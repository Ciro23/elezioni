<?php

namespace App\Models;

use CodeIgniter\Model;

class Vote extends Model {
 
    protected $table = "voti";

    protected $allowedFields = ["partito", "candidato_1", "candidato_2"];

    protected $validationRules = "vote";

    /**
     * gets the number of votes of every party
     * 
     * @return array
     */
    public function getVotesForParties(): array {
        $builder = $this->select("partiti.nome, count(voti.id) as n_voti");
        $builder->join("partiti", "partiti.id = voti.partito");
        $builder->groupBy("partito");

        return $builder->get()->getResult();
    }

    /**
     * gets the number of votes and percentuage for every candidate
     * 
     * @return array
     */
    public function getVotesForCandidates(): array {
        $db = db_connect();
        $result = $db->query("select candidati.nome, candidati.cognome, candidati.partito, (count(*) / (select count(*) from voti) * 50) as percentuale, count(*) as voti from candidati join voti on voti.candidato_1 = candidati.id or voti.candidato_2 = candidati.id group by candidati.id");

        return $result->getResultArray();
    }
}