<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'section'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

}
