<?php

namespace App\Models;

use App\Libraries\RandomId;
use CodeIgniter\Model;

class User extends Model {

    protected $table = "utenti";

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

    /**
     * gets the user id by their email
     * 
     * @param string $email
     * 
     * @return string|null
     */
    public function getUserIdByEmail(string $email): string|null {
        $builder = $this->select("id");
        $builder->where("email", $email);

        if ($builder->countAllResults(false) === 1) {
            return $builder->get()->getRow()->id;
        }

        return null;
    }

    /**
     * gets the user details by their id
     * 
     * @param string $id
     * 
     * @return object|null
     */
    public function getUserDetails(string $id): object|null {
        $builder = $this->select();
        $builder->where("id", $id);

        if ($builder->countAllResults(false) === 1) {
            return $builder->get()->getRow();
        }

        return null;
    }

    /**
     * checks if the user is an admin
     * 
     * @param string $id
     * 
     * @return bool
     */
    public function isUserAdmin(string $id): bool {
        return $this->getUserRole($id) == 1;
    }

    /**
     * gets the user role by their id
     * 
     * @param string $id
     * 
     * @return int|null
     */
    public function getUserRole(string $id): int|null {
        // $builder = $this->select("role");
        // $builder->where("id", $id);

        // if ($builder->countAllResults(false) == 1) {
        //     return $builder->get()->getRow()->role;
        // }

        return null;
    }
}
