<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    public function path()
    {
    	return url("/posting/{$this->id}-". Str::slug($this->title));
    }

    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }
}
