@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="card">
    		<div class="card-header">
    			<div class="row">
    			<div class="col-md-6">DASHBOARD</div>
    			<div class="col-md-6 text-end">Hi, {{\Auth::guard('admin')->user()->name}}</div>
    		</div>
    		</div>
    		<div class="card-body">
        	<form method="post" action="{{route('admin.saveComment')}}">
        		@csrf
        	<input type="hidden" name="is_admin" value="{{$is_admin}}">
        	<div class="row">
        		<div class="col-md-10">
           <textarea class="form-control" name="comment"></textarea>
       </div>
           <div class="col-md-2"> 
           <button class="btn btn-purple">submit</button>
       </div>
           </form>
           <ul class="mt-4">
           	@foreach($comments as $key => $com)
           	<li>
           		<div class="row">
           			<div class="col-md-1">
           				<img class="liImg" src="{{asset('assets/img/avatar.jpg')}}">
           			</div>
           			<div class="col-md-11"> 
           				<p><b>@if($com->is_admin == 1) {{$com->admins->name}} - Admin @else {{$com->customer->name}} -  Customer @endif</b> <span style="float: right;color: grey">{{$com->created_at->format('d/m/Y')}}</span></p>
           				<p>{{$com->comments}}</p>
           			</div>
           	</li>
           	@endforeach
           </ul>
       </div>
       </div>
        </div>
</div>
@endsection
