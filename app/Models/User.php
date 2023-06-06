<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    protected $connection = 'mongodb';
    protected $collection = 'user';

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
 
    public function getJWTCustomClaims()
    {
        return [];
    }
}