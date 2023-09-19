<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        $Product = Products::all();
        return view('list', compact('Product'));
    }


    //store in DB
    public function store(Request $request) 
    {

        $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'product_qnt' => 'required',
            'price' => 'required',
        ]);
        

        $product = new Products();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_qnt = $request->product_qnt;
        $product->price = $request->price;


        $imagePath = $request->file('product_img')->store('public/images');
        $product->product_img = str_replace('public/', '', $imagePath);

        $product->save();
        

        return redirect()->route('list')->with('success', 'Product Added Successfully!');
    }

    public function show($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return abort(404); // Or you can display a custom error page
        }

        return view('show', compact('product'));
    }


}
