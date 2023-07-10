<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comments;
use App\Models\Admins;
use App\Models\customer;

class CommentController extends Controller
{
    public function saveComment(Request $req)
    {
    	$comment = $req->comment;
    	$admin = $req->is_admin;
    	$id = \Auth::guard('admin')->user()->id;
    	$user_id = Admins::where('id',$id)->pluck('id');
    	$user_id = $user_id[0];
    	$comments = new comments;
    	$comments->comments = $comment;
    	$comments->is_admin = $admin;
    	$comments->user_id = $user_id;
    	$comments->save();
        return redirect()->route('admin.dashboard',['is_admin' => $admin]);
    }

    public function saveCusComment(Request $req)
    {
    	$comment = $req->comment;
    	$admin = $req->is_admin;
    	$id = \Auth::guard('customer')->user()->id;
    	$user_id = customer::where('id',$id)->pluck('id');
    	$user_id = $user_id[0];
    	$comments = new comments;
    	$comments->comments = $comment;
    	$comments->is_admin = $admin;
    	$comments->user_id = $user_id;
    	$comments->save();
        return redirect()->route('customer.dashboard',['is_admin' => $admin]);
    }
}
