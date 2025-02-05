<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emp extends Model
{
    use HasFactory;
    
	    protected $fillable = [

        'name', 
		'salary',
		'file',
		'age',
		'gender',
		'hobbyes',
		'address'

    ];
}
