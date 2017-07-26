<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Account extends Authenticatable
{
    use LaratrustUserTrait, Notifiable;

    protected $connection = 'auth';

    protected $table = 'account';

    protected $fillable = [
        'username', 'password', 'email', 'expansion'
    ];

    protected $hidden = [
        'sha_pass_hash',
    ];
    protected $dates = ['joindate'];

    public $timestamps = false;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating( function ($model) {
            $model->attributes['joindate'] = $model->freshTimestamp();
        });
    }

    // Accounts table doesn't have remember_token column
    // according to the trinity documentation.

    public function getRememberTokenName()
    {
      return null;
    }

    protected function setPasswordAttribute($value)
    {
        $this->attributes['sha_pass_hash'] = strtoupper(sha1(strtoupper($this->attributes['username']).':'.strtoupper($value)));
    }

    // This is the TEMPORARY method to somehow authorize user
    // permissions wich will be REPLACED with full ACL system
    // using roles and permissions.

    public function isStuffMember()
    {
        return \DB::connection('auth')->table('account_access')->whereId($this->id)->where('gmlevel', '>=', 3)->first() === null ? false : true;
    }

}
