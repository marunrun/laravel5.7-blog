<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates =['published_at','created_at','updated_at','deleted_at'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}
