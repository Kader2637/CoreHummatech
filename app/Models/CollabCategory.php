<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollabCategory extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function collabMitra()
    {
        return $this->hasMany(CollabMitra::class);
    }
}