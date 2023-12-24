<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model implements AuthenticatableContract
{
    use HasFactory, AuthAuthenticatable;
    protected $fillable = [
        'nom', 'prenom', 'adresse', 'email', 'telephone', 'genre', 'date_de_naissance', 'password'
    ];
}
