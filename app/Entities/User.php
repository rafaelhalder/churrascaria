<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    public $timestamps   = true;
    protected $table     = 'users';
    protected $fillable  = ['cpf','name','phone','email','password','status','permission'];
    protected $hidden    = ['password','remember_token'];
}
