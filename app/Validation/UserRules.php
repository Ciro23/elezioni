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
    public function are_credentials_correct(string $pin, string $fields, array $data): bool {
        $userModel = new \App\Models\User();
        $hashedPassword = $userModel->getUserPasswordByPin($pin);

        return password_verify($data['password'], $hashedPassword);
    }
}
