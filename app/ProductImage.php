<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $timestamps = false;

    public static function getProductImages($id)
    {
        return self::where('product_id', $id)
                ->get();
    }
}
