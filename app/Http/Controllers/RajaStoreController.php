<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RajaStoreController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index',compact('products'));
    }

    public function saveProduct(Request $req){
        //validate

        //save
        $prod = new Product();
        $prod->title = $req->title;
        $prod->description = $req->description;
        $prod->original_price = $req->original_price;
        $prod->current_price = $req->current_price;



        $fileName = time() . '.' . $req->image->extension();
        $req->image->storeAs('public/images', $fileName);
        $prod->image = $fileName;
        $prod->save();

        return back()->with('success', 'Product saved successfully 😂');

    }
}
