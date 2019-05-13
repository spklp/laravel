<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($activeCategory){

        $category = Category::getActiveCategory($activeCategory);

        if ($activeCategory == 'all'){
            $products = Product::paginate(4);
            return view('categories.index', compact('category', 'products'));
        }

        $products = Product::getProductsActiveCategory($category->category_id);
        return view('categories.index', compact('category', 'products'));
    }

}

