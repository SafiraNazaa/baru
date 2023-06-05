<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bentuk extends Model
{
    use HasFactory;
    protected $table = "bentuks";
    protected $fillable = [
        'kodebentuk', 'bentukobat',
    ];
}
