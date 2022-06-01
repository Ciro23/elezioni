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
        $result = $db->query("SELECT partiti.nome, ROUND((COUNT(*) / (SELECT COUNT(*) FROM voti) * 100), 2) AS percentuale, COUNT(*) AS n_voti
        FROM voti
        JOIN partiti ON voti.partito=partiti.id
        GROUP BY partiti.id");

        return $result->getResult();
    }

    /**
     * gets the number of votes and percentuage for every candidate
     * 
     * @return array
     */
    public function getVotesForCandidates(): array {
        $db = db_connect();
        $result = $db->query("SELECT candidati.nome AS nome, candidati.cognome, partiti.nome AS partito, ROUND((COUNT(*) / (SELECT COUNT(*) FROM voti) * 50), 2) AS percentuale, COUNT(*) AS n_voti
        FROM candidati
        JOIN voti ON voti.candidato_1=candidati.id OR voti.candidato_2=candidati.id
        JOIN partiti ON partiti.id=candidati.partito
        GROUP BY candidati.id");

        return $result->getResult();
    }

    /**
     * gets the number of votes and percentuage based on gender
     * 
     * @return array
     */
    public function getVotesForGender(): array {
        $db = db_connect();
        $result = $db->query("SELECT voti.sesso, COUNT(*) as n_voti, ROUND((COUNT(*) / (SELECT COUNT(*) FROM voti) * 100), 2) as percentuale
        FROM voti
        GROUP BY voti.sesso");

        return $result->getResult();
    }

    /**
     * gets the number of SI
     * 
     * @return array
     */
    public function getAge(): array {
        $db = db_connect();
        $result = $db->query("SELECT (TRUNCATE(utenti.eta, -1) + 10) AS fasciaEta, COUNT(*) AS votanti
        FROM utenti
        WHERE utenti.ha_votato IS NOT NULL
        GROUP BY utenti.eta
        ORDER BY utenti.eta");

        return $result->getResult();
    }

    /**
     * gets the number of SI
     * 
     * @return array
     */
    public function getRegioni(): array {
        $db = db_connect();
        $result = $db->query("SELECT regioni.nome, ROUND((COUNT(*)/(SELECT COUNT(*) FROM utenti WHERE utenti.ha_votato IS NOT NULL)*100), 2) AS percentuale
        FROM utenti
        INNER JOIN regioni ON utenti.regione=regioni.id
        WHERE utenti.ha_votato IS NOT NULL
        GROUP BY utenti.regione");

        return $result->getResult();
    }

    /**
     * gets the number of SI
     * 
     * @return array
     */
    public function getVotes(): array {
        $db = db_connect();
        $result = $db->query("SELECT COUNT(*) AS tot FROM voti");

        return $result->getResult();
    }
}