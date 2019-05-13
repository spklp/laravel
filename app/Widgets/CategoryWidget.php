<?php

namespace App\Widgets;

use App\Category;
use Klisl\Widgets\Contract\ContractWidget;


class CategoryWidget implements ContractWidget{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute(){
        $categories = Category::all();
        return view('Widgets::categories', compact('categories'));

    }
}
