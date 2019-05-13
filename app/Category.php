<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    public static function getActiveCategory($activeCategory)
    {
        return self::where('link_name', $activeCategory)
                ->first();
    }
}
