<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\StringManipulation;

class Topic extends Model
{
    use StringManipulation;

    protected $connection = 'mysql';

    protected $fillable = ['title', 'content', 'account_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
