<?php

namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    protected $connection = 'mysql';
    protected $fillable = ['name', 'display_name', 'description'];

    // Pivot table default location is `site` database, but Many-to-Many
    // relationship is using targets table for retrieving the data from
    // pivot table. This method overrides default laratrust method.

    public function accounts()
    {
        $database = $this->getConnection()->getDatabaseName();
        
        return $this->belongsToMany(Account::class, "{$database}.account_role");
    }
}
