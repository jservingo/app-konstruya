<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	//Convertir el carrito de compras activo en un pedido penditente
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save();

    	$notification = "Tu pedido se ha registrado correctamente.";	
    	return back()->with(compact('notification'));
    }
}
