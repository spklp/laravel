<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Order;
use App\InfoOrder;
use App\OrderInfo;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{

    public function index()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.category_id')
                ->orderBy('id', 'desc')
                ->paginate(20);

        return view('cabinet.products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::join('categories', 'products.category_id', '=', 'categories.category_id')
                ->where('id', $id)
                ->first();
        $categories = Category::all();
        $productImages = ProductImage::where('product_id', $id)->get();

        return view('cabinet.products.edit', compact('product', 'categories', 'productImages'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->original_price = $request->original_price;
        $product->price = $request->price;
        $product->descr = $request->descr;
        $product->flag = $request->flag;

        if ($request->file('image')) {
            foreach ($request->file('image') as $imageId => $image){
                $path = Storage::putFile('public', $image);
                $url = Storage::url($path);
                if ($imageId !== 'main') { // todo проверить тип данных
                    $productImage = ProductImage::find($imageId);
                    $productImage->image = $url;
                    $productImage->update();
                }
                else{
                    $product->img = $url;
                }
            }
        }

        $product->update();
        session()->flash('success', 'Product successfully update!');
        return redirect()->route('adminProducts.edit', compact('id'));
    }

    public function create(){

        $categories = Category::all();

        return view('cabinet.products.create', compact('categories'));
    }

    public function store(ProductRequest $request){
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->original_price = $request->original_price;
        $product->price = $request->price;
        $product->descr = $request->descr;
        $product->flag = $request->flag;
        $product->link_name = Str::slug($request->name);
        if($request->file('image.main')){
            $path = Storage::putFile('public', $request->file('image.main'));
            $url = Storage::url($path);
            $product->img = $url;
        }
        $product->save();

        $product = Product::orderBy('id', 'desc')
                ->where('name', $request->name)
                ->first();

        if ($request->file('image')) {
            foreach ($request->file('image') as $imageId => $image){
                if ($imageId !== 'main') {

                    $path = Storage::putFile('public', $image);
                    $url = Storage::url($path);
                    $productImage = new ProductImage;
                    $productImage->product_id = $product->id;
                    $productImage->image = $url;
                    $productImage->save();
                }
                else{
                    continue;
                }
            }
        }
        session()->flash('success', 'Product successfully added!');
        return redirect()->route('adminProducts.index');
    }

    public function destroy($id)
    {
        $category = Product::find($id);
        $category->delete();

        session()->flash('success', 'Product successfully delete!');
        return redirect()->route('adminProducts.index');
    }
}
