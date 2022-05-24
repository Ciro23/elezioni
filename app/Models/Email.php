<?php

namespace App\Models;

use CodeIgniter\Model;

class Email extends Model {

    protected $primaryKey = "hash";

    protected $table = "email_hashes";

    protected $allowedFields = ["hash", "utente"];

    protected $beforeInsert = ["generateRandomId"];

    /**
     * this method is called before every insert action invoked by this class
     * 
     * @param array $data
     * 
     * @return array
     */
    public function generateRandomId(array $data): array {
        $randomId = new \App\Libraries\RandomId();

        $data['data']['hash'] = $randomId->generateRandomId(32);

        return $data;
    }

    public function sendEmail(string $user) {
        $builder = $this->select("hash, email");
        $builder->join("utenti", "email_hashes.utente = utenti.tessera_elettorale");
        $builder->where("email_hashes.utente", $user);
        
        $result = $builder->get()->getRow();

        $userEmail = $result->email;
        $hash = $result->hash;

        $url = base_url() . "/signup/verificate-email/" . $hash;

        $email = service("email");
        $email->setFrom('develop@mmcomputers.it', 'Develop Develop');
        $email->setTo($userEmail);
        $email->setSubject("Verifica la tua email - Votazioni parlamentari");
        $email->setMessage("Clicca <a href='{$url}'>qui</a> per verificare il tuo indirizzo email");
        var_dump($email->send());
    }

    public function verificate(string $hash) {
        $builder = $this->select("hash");
        $builder->where("hash", $hash);

        return $builder->countAllResults(false) === 1;
    }
}