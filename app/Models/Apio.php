<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apio extends Model
{
    protected $fillable = ['nom', 'tipus', 'caducitat'];
    use HasFactory;
}
