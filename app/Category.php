<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mysql';

    protected $fillable = ['name', 'category_description', 'parent_id', 'category_slug'];

    public function forums()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
