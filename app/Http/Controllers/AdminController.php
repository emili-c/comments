<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comments;
use Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
    	$customerComments = comments::with('customer')->where('is_admin', 0);
		$adminComments = comments::with('Admins')->where('is_admin', 1);
		$comments = $customerComments->union($adminComments)->orderBy('id')->get();
        return view('admin.dashboard',['comments' => $comments,'is_admin' => 1]);
    }
}
