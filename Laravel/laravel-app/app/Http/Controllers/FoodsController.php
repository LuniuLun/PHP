<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Http\Requests\CreateValidationRequest;

class FoodsController extends Controller
{
    public function index() {
        $foods = Food::all();
        //dd($foods);
        // $foods = Food::where('name', '=', 'sushi')
        //             ->get();
                    // ->firstOrFail();// chi tra ve 1 phan tu 
        return view('foods.index', [
            'foods' => $foods,
        ]);
    }
    public function show($id) {
        // dd('This is show function' .$id);
        $food = Food::find($id);
        $category = Category::find($food->category_id);
        $food->category = $category;
        return view('foods.show')->with('food', $food);
    }
    public function create() {        
        $categories = Category::all();
        return view('foods.create')->with('categories', $categories);
    }    
    public function store(Request $request) {
        // $food = new Food();
        // $food->name = $request->input('name');
        // $food->count = $request->input('count');
        // $food->description = $request->input('description');
        // $food->save();
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required|unique:food',
        //     'count' => 'required|integer|min:0|max:1000',
        //     'category_id' => 'required',
        // ]);
        // dd($request->file('image')->guessExtension());//jpg, jpeg,...
        // dd($request->file('image')->getClientOriginalName());

        $request->validate([
            'name' => 'required|unique:food',
            'count' => 'required|integer|min:0|max:1000',
            'category_id' => 'required',
            'image' => 'required|mimes:jpg, png, jpeg|max:5048'
        ]);
        $generatedImageName = 'image'.time().'-'
                                .$request->name.'.'
                                .$request->image->guessExtension();
        // $request->validated();
        // dd($generatedImageName);
        $request->image->move(public_path('img'), $generatedImageName);
        $food = Food::create([
            'name' => $request->input('name'),
            'count' => $request->input('count'),
            'description' => $request->input('description'),
            'image_path' => $generatedImageName,
            'category_id' => $request->input('category_id'),
        ]);
        return redirect('/foods');
    }
    public function update(CreateValidationRequest $request, $id) {
        $request->validated();
        $food = Food::Where('id', $id)
                    ->update([
                        'name' => $request->input('name'),
                        'count' => $request->input('count'),
                        'description' => $request->input('description'),
                    ]);
        return redirect('/foods');
    }

    public function destroy($id) {
        $food = Food::Where('id', $id)
                    ->delete();
        return redirect('/foods');
    }
    public function edit($id) {
        // dd($id);
        $food = Food::find($id)->firstOrFail();
        // dd($food);
        return view('foods.edit')->with('food', $food);
    }
}
