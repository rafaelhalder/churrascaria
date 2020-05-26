<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserSocial extends Model
{
    use SoftDeletes;
    use Notifiable;


    public $timestamps   = true;
    protected $table     = 'users';
    protected $fillable  = ['cpf','name','phone','email','password','status','permission'];
    protected $hidden    = ['password','remember_token'];

}
