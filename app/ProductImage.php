<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    // $productImage->product
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute()
    {
    	// Si el atributo image empeza con http, devolver el valor original
    	if (substr($this->image, 0, 4) === "http") {
    		return $this->image;
    	}
        // De lo contrario, devolver la ruta de la imagen local
    	return '/images/products/' . $this->image;
    }
}
