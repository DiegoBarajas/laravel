<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'done'
    ];
    // public $timestamps = false; // Omite timespamps

    public function categories()
    {
        return $this->belongsToMany(category::class);
    }
}
