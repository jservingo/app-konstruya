<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntranetController extends Controller
{
    public function show_ayuda()
	{
    	return view('ayuda');
	}
}
