<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionAndMision extends Model
{
    use HasFactory;
    // protected $fillable = ['vision'];
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(MisionItems::class);
    }
}