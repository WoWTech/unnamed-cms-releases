<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\StringManipulation;

class Comment extends Model
{
    use StringManipulation;

    protected $fillable = ['content', 'account_id', 'post_id'];

    protected $connection = 'mysql';

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
