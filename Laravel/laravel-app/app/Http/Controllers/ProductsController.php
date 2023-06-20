<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $title = 'Laravel Course form nguyenducvan';
        // return view('products.index', compact('title'));
        $myPhone =[
            'name' => 'iphone 14',
            'year' => 2022,
            'isFavourited' => true
        ];
        // return view('products.index', compact('myPhone'));
        // return view('products.index', [
        //     'myPhone' => $myPhone
        // ]);
        print_r(route('products'));
        return view('products.index');
    }

    public function about() {
        return 'this is about page';
    }

    public function detail($productName ,$id) {
        return "product's name = " .$productName.
                ",product's id = ".$id;
    }
}
