<?php

namespace App\Libraries;

class RandomId {

    public function generateRandomId(int $id_length): string {
        $string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        return substr(str_shuffle($string), 0, $id_length);
    }
}
