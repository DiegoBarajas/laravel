<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color'
    ];
    public $timestamps = false;

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
