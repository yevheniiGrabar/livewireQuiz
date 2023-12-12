<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
    use HasFactory;

    public $fillable = ['*'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
