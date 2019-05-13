<?php

namespace App\Widgets;

use App\Category;
use Klisl\Widgets\Contract\ContractWidget;

/**
 * Class NavWidget
 * Класс для демонстрации работы расширения
 * @package App\Widgets
 */
class NavWidget implements ContractWidget{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute(){
        $categories = Category::all();
        return view('Widgets::nav', compact('categories'));

    }
}
