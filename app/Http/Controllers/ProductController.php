<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $search = $request->search;
        if ($search){
            $products = Product::getSearchProducts($search);
            return view('products.index', compact('products', 'categories', 'search'));
        }

        $products = Product::getProducts();
        return view('products.index', compact('products', 'categories'));

    }

    public function show($id)
    {
        $product = Product::find($id);
        $relatedProducts = Product::getRelatedProducts($product->category_id);
        $productImages = ProductImage::getProductImages($id);

        return view('products.show', compact('product', 'relatedProducts', 'productImages'));
    }
}
