<?php

namespace App\Models;

use App\Libraries\RandomId;
use CodeIgniter\Model;

class User extends Model {

    protected $table = "utenti";

    protected $allowedFields = ["tessera_elettorale", "nome", "cognome", "eta", "pin", "ha_votato", "sesso", "regione"];

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
            $data['data']['pin'] = $randomId->generateRandomId();
        } while ($this->doesUserExist($data['data']['pin']));

        return $data;
    }

    /**
     * gets the user password given their pin
     * 
     * @param string $pin
     * 
     * @return string|null
     */
    public function getUserPasswordByPin(string $pin): string|null {
        $builder = $this->select("password");
        $builder->where("pin", $pin);

        if ($builder->countAllResults(false) === 1) {
            return $builder->get()->getRow()->password;
        }

        return null;
    }

    /**
     * checks if a user already exists
     * 
     * @param string $id
     * 
     * @return bool
     */
    public function doesUserExist(string $id): bool {
        $builder = $this->select("tessera_elettorale");
        $builder->where("tessera_elettorale", $id);

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