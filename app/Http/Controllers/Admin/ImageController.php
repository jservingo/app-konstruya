<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;

class ImageController extends Controller
{
    public function index($id)
    {
    	// Mostrar imágenes asociadas al producto seleccionado
    	$product = Product::find($id);
		//$images  = $product->images;
    	$images  = $product->images()->orderBy('featured', 'desc')->get();
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id)
	{
		// Guardar la imagen en el proyecto
		$file = $request->file('photo');  // Obtener el archivo que se sube
		$path = public_path() . '/images/products';
		$fileName = uniqid() . $file->getClientOriginalName();
		$moved = $file->move($path, $fileName);
    
		// Crear un registro en la tabla product_image
		if ($moved) {
			$productImage = new ProductImage();
			$productImage->image = $fileName;
			// $productImage->featured = ;
			$productImage->product_id = $id;
			$productImage->save();
		}
    
		return back();
	}

	public function destroy(Request $request, $id)
	{
		// Eliminar el archivo
		// $productImage = ProductImage::find($request->input('image_id'));
		$productImage = ProductImage::find($request->image_id);
		// Si el valor del campo image empieza por http, no eliminar nada
		if (substr($productImage->image, 0, 4) == "http") {
			$delete = true;
		} else {
			$fullPath = public_path() . '/images/products' . $productImage->image;
			$delete = File::delete($fullPath);
		}
    
		// Eliminar el registro de la img en la BD
		if ($delete) {
			$productImage->delete();
		}
    
		return back();
	}

	public function select($id, $image)
	{
		// Desmarcar todas las imágenes destacadas del producto
		ProductImage::where('product_id', $id)->update(['featured' => false]);

		$productImage = ProductImage::find($image);
		$productImage->featured = true;
		$productImage->save();

		return back();
	}
}
