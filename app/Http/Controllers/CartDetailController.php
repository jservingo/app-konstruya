<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
    	//Cada cliente tiene un solo carrito de compras activo
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();
        $notification = "El producto se ha cargado a tu carrito de compras.";
    	return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
        $cartDetail = CartDetail::find($request->cart_detail_id);
        //Verificar que el detail pertenezca al carrito activo del usuario
        if ($cartDetail->cart_id == auth()->user()->cart->id)
            $cartDetail->delete();
        $notification = "El producto se ha eliminado del carrito de compras.";
        return back()->with(compact('notification'));
    }
}