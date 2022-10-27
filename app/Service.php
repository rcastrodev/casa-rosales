<?php

namespace App;

use App\PostService;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'order', 'description', 'img'];

}
