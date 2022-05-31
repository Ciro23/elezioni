<?php

namespace App\Models;

use CodeIgniter\Model;

class Vote extends Model {
 
    protected $table = "voti";

    protected $allowedFields = ["partito", "candidato_1", "candidato_2", "sesso", "eta", "regione"];

    protected $validationRules = "vote";

    /**
     * gets the number of votes of every party
     * 
     * @return array
     */
    public function getVotesForParties(): array {
        $db = db_connect();
        $result = $db->query("select partiti.nome, (count(*) / (select count(*) from voti) * 100) as percentuale, count(*) as n_voti from voti join partiti on voti.partito = partiti.id group by partiti.id");

        return $result->getResult();
    }

    /**
     * gets the number of votes and percentuage for every candidate
     * 
     * @return array
     */
    public function getVotesForCandidates(): array {
        $db = db_connect();
        $result = $db->query("select candidati.nome as nome, candidati.cognome, partiti.nome as partito, (count(*) / (select count(*) from voti) * 50) as percentuale, count(*) as n_voti from candidati join voti on voti.candidato_1 = candidati.id or voti.candidato_2 = candidati.id join partiti on partiti.id = candidati.partito group by candidati.id");

        return $result->getResult();
    }

    /**
     * gets the number of votes and percentuage based on gender
     * 
     * @return array
     */
    public function getVotesForGender(): array {
        $db = db_connect();
        $result = $db->query("select voti.sesso, count(*) as n_voti, (count(*) / (select count(*) from voti) * 100) as percentuale from voti GROUP BY voti.sesso");

        return $result->getResult();
    }
}