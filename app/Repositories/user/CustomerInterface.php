<?php

namespace App\Repositories\user;

interface CustomerInterface {

    public function findByEmail($email);

    public function createDefaultUser($array);

}
