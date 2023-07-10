<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comments;

class CustomerController extends Controller
{
    public function dashboard()
    {
    	$comments = comments::with('customer') ->where('is_admin', 0) ->get();
        return view('customer.dashboard',['comments'=>$comments,'is_admin'=>0]);
    }
}
