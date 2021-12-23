<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    public function getAuthIdentifierName(){
        return 'id';
    }
    
    public function getAuthIdentifier(){
        return $this->id;
    }
    
    public function getAuthPassword(){
        return $this->password;
    }
    
    public function getRememberToken(){
        return $this->rememberToken;
    }

    public function setRememberToken($valor){
        $this->rememberToken = $valor;
        return $valor;

    }

    public function getRememberTokenName(){
        return 'remember_token';
    }
}
