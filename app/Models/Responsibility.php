<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function projects()
    {
        return $this->hasMany(Project::class, 'responsibility_id', 'id');

    }
    public function users(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
