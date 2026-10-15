<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transparency extends Model
{
    protected $fillable = ['title', 'file_path', 'type', 'thumbnail'];
}
