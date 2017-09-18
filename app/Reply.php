<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $connection = 'mysql';

    protected $fillable = ['content', 'user_id', 'account_id'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
