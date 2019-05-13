<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function getSearchProducts($search)
    {
        return self::join('categories', 'products.category_id', '=', 'categories.category_id')
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('products.descr', 'like', '%' . $search . '%')
            ->orWhere('category_name', 'like', '%' . $search . '%')
            ->get();
    }

    public static function getProducts()
    {
        return self::orderBy('created_at', 'desc')
                ->take(8)
                ->get();
    }

    public static function getRelatedProducts($id)
    {
        return self::where('category_id', $id)
                ->take(4)
                ->get();
    }

    public static function getProductsActiveCategory($id)
    {
        return self::where('category_id', $id)
                ->paginate(4);
    }
}
