<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [ 'title', 'description','is_completed', ];
        //mengatur field yang bisa diisi secara massal
    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
        ];
    }
}
