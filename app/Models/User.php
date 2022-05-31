<?php

namespace App\Models;

use App\Libraries\RandomId;
use CodeIgniter\Model;

class User extends Model {

    protected $table = "utenti";

    protected $primaryKey = "tessera_elettorale";

    protected $useAutoIncrement = false;

    protected $allowedFields = ["tessera_elettorale", "nome", "cognome", "email", "eta", "pin", "ha_votato", "sesso", "regione"];

    protected $validationRules = "user";

    protected $beforeInsert = ["generateRandomId"];

    /**
     * this method is called before every insert action invoked by this class
     * 
     * @param array $data
     * 
     * @return array
     */
    public function generateRandomId(array $data): array {
        $randomId = new RandomId();

        do {
            $data['data']['pin'] = $randomId->generateRandomId(10);
        } while ($this->doesPinExist($data['data']['pin']));

        return $data;
    }

    public function hasVoted(string $pin) {
        $builder = $this->select();
        $builder->where("pin", $pin);

        return $builder->countAllResults(false) === 1;
    }

    /**
     * checks if a user already exists
     * 
     * @param string $id
     * 
     * @return bool
     */
    public function doesPinExist(string $pin): bool {
        $builder = $this->select("pin");
        $builder->where("pin", $pin);

        return $builder->countAllResults() === 1;
    }

    public function getEmailPinHash(string $id): object {
        $builder = $this->select("hash, email, pin");
        $builder->join("email_hashes", "email_hashes.utente = utenti.tessera_elettorale");
        $builder->where("email_hashes.utente", $id);
        
        return $builder->get()->getRow();
    }

    /**
     * gets the user pin by their email
     * 
     * @param string $email
     * 
     * @return string|null
     */
    public function getUserPinByEmail(string $email): string|null {
        $builder = $this->select("pin");
        $builder->where("email", $email);

        if ($builder->countAllResults(false) === 1) {
            return $builder->get()->getRow()->pin;
        }

        return null;
    }

    public function getUserElectoralCardByPin(string $pin): string|null {
        $builder = $this->select("tessera_elettorale");
        $builder->where("pin", $pin);

        if ($builder->countAllResults(false) === 1) {
            return $builder->get()->getRow()->tessera_elettorale;
        }

        return null;
    }
}
