<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['nik', 'name', 'title', 'content', 'attachment', 'status', 'reply'];
}
