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

    public function sendEmail(string $userEmail, string $subject, string $message): void {
        $email = service("email");
        $email->setFrom('develop@mmcomputers.it', 'Develop Develop');
        $email->setTo($userEmail);
        $email->setSubject($subject);
        $email->setMessage($message);
        $email->send();
    }

    public function verificate(string $hash) {
        $builder = $this->select("hash");
        $builder->where("hash", $hash);

        return $builder->countAllResults(false) === 1;
    }
}