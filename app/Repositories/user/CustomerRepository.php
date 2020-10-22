<?php

namespace App\Repositories\user;

use App\Repositories\EloquentRepository;
use App\Repositories\user\CustomerInterface;
use App\User;

class CustomerRepository extends EloquentRepository implements CustomerInterface{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public $defaultPassword = '12345';

    public function findByEmail($email){
        return User::where('email',$email)->first();
    }

    public function createDefaultUser($data){
        return User::create($data);
    }

}
