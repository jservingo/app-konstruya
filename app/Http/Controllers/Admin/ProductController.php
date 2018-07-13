<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	//$products = Product::all();
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));  //
    }

    public function create()
    {
    	return view('admin.products.create');
    }

    public function store(Request $request)
    {
    	//Registrar el producto en la BD
    	//dd($request->all());  //Termina la ejecicion y hace echo del request
    	$product = new Product();
    	$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->category_id = 1;
		$product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));   
    }

    public function update(Request $request, $id)
    {
        //registrar el producto en la base de datos
        //dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = 1;
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
    }  

    public function destroy($id)
    {
        //eliminar el producto de la base de datos
        $product = Product::find($id);
        $product->delete();

        return back();
    }      
}
