<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'program'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

}
