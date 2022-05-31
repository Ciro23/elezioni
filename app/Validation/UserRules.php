<?php

namespace App\Validation;

class UserRules {

    /**
     * checks if one user with both specifies email and password exists
     * 
     * @param string $email
     * @param string $password
     * 
     * @return bool
     */
    public function does_pin_exist(string $pin, string $fields, array $data): bool {
        $userModel = new \App\Models\User();
        return $userModel->doesPinExist($pin);
    }

    public function has_not_voted(string $pin, string $fields, array $data): bool {
        $userModel = new \App\Models\User();
        return $userModel->hasVoted($pin);
    }
}
