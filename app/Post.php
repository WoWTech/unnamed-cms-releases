<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\StringManipulation;

class Post extends Model
{
  
    use StringManipulation;

    protected $fillable = ['title', 'content', 'account_id', 'post_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = trim($value);
    }

}
