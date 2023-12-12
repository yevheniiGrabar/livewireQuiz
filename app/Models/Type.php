<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 * @package App\Models
 * @property integer $id
 * @property string $name
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];
}
