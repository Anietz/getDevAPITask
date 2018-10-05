<?php

namespace App;


use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table ="users";

    //const CREATED_AT = 'date_created';
    //const UPDATED_AT = 'date_modified';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','activation_code', 'account_type','activated','username',
        'age','state','address','occupation','education_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activation_code'
    ];

      public function user_game()
    {
        return $this->hasOne('App\User_games');
    }

       public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }
}
