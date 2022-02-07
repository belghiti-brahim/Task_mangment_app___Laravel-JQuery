<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function actions()
    {
        return $this->hasMany(Action::class, 'project_id', 'id');
    }

    public function responsibility()
    {
     return $this->belongsTo(Responsibility::class, "responsibility_id", 'id');
    }
}
