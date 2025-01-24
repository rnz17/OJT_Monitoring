<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'student_id',
        'column_id',
        'content',
    ];

    /**
     * Relationship: A file belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: A file is linked to a dynamic column.
     */
    public function column()
    {
        return $this->hasOne(Column::class, 'column_name', 'column_name');
    }
}
