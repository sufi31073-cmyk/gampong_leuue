<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterRequest extends Model
{
    protected $fillable = ['letter_template_id', 'nik', 'name', 'purpose', 'attachment', 'resi_number', 'status'];

    public function template()
    {
        return $this->belongsTo(LetterTemplate::class, 'letter_template_id');
    }
}
