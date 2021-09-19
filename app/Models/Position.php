<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use \App\Models\Part;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
