<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    // 每一个issue，都属于一个user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}