<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    /**
     * このユーザが所有する投稿。（ Micropostモデルとの関係を定義）
     */
     
     //ユーザーのタクスは複数存在する為、複数系で記載する。
     //「Task」モデルを参照すること
    public function tasks()
    {
        //一対多の関係
        return $this->hasMany(Task::class);
    }
    
    
    
}
