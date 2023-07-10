<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    public function Admins()
	{
	    return $this->belongsTo(Admins::class, 'user_id', 'id');
	}
	public function customer()
	{
	    return $this->belongsTo(customer::class, 'user_id', 'id');
	}
}