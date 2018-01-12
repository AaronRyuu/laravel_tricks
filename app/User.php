<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'provider', 'uid', 'avatar'
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
     * 发送邮件
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    // 一个user 有很多 issues。
    public function issues()
    {
        return $this->hasMany('App\Models\Issue');
    }

    // 一个 user有很多 comments
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * 用户头像
     * @return mixed|string
     */
    public function avatar()
    {
        return $this->avatar ? $this->avatar : "https://www.gravatar.com/avatar/" . md5(strtolower($this->email)) . "?d=retro&s=48";
    }
}
