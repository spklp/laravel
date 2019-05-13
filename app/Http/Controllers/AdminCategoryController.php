<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Order;
use App\InfoOrder;
use App\OrderInfo;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();


        return view('cabinet.categories.index', compact('categories'));
    }

    public function edit($id)
    {

        $category = Category::find($id);

        return view('cabinet.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->name;
        $category->link_name = Str::slug($request->name);
        $category->category_descr = $request->descr;

        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $category->category_img = $url;
        }
        $category->update();
        session()->flash('success', 'Category successfully update!');
        return redirect()->route('adminCategories.edit', compact('id'))->with('success', 'Пост успешно отредактирвоан!');
    }

    public function create(){
        return view('cabinet.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->category_name = $request->name;
        $category->link_name = Str::slug($request->name);
        $category->category_descr = $request->descr;
        if($request->file('image')){
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $category->category_img = $url;
        }
        $category->save();

        session()->flash('success', 'Category successfully added!');
        return redirect()->route('adminCategories.index')->with('success2', 'Пост успешно отредактирвоан2!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        $products = Product::where('category_id', null)->get();
        foreach ($products as $product){
            $product->category_id = 1;
            $product->save();
        }
        session()->flash('success', 'Category successfully delete!');
        return redirect()->route('adminCategories.index')->with('success', 'Пост успешно Удален!');
    }
}
